<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Accessoire;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\VoitureRequest;

class VoituresController extends Controller
{

    public $nbVoituresParPage = 5;

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $voitures = Voiture::with('user')
            ->paginate(10);
        $links = $voitures->render();
        // dd($voitures);
        return view('view_voitures', compact('voitures', 'links'));
    }

    public function create()
    {
        return view('view_ajoute_voiture');
    }
    public function store(VoitureRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $voiture = Voiture::create($inputs);


        if (isset($inputs['accessoires'])) {
            $tabAccessoires = explode(',', $inputs['accessoires']);
            foreach ($tabAccessoires as $accessoire) {
                // trim(...) enlève les espaces superflux en début et en fin de chaîne
                $accessoire = trim($accessoire);

                // Str::slug génère une nouvelle chaîne similaire à $motcle mais
                // adaptation des caractères accentués et/ou caractères spéciaux
                $accessoire_url = Str::slug($accessoire);
                $accessoire_ref = Accessoire::where('type_url', $accessoire_url)->first();
                if (is_null($accessoire_ref)) {
                    $accessoire_ref = new Accessoire([
                        'type' => $accessoire,
                        'type_url' => $accessoire_url
                    ]);
                    $voiture->accessoires()->save($accessoire_ref);
                } else {
                    $voiture->accessoires()->attach($accessoire_ref->id);
                }
            }
        }


        return redirect(route('voitures.index'));
    }
    public function destroy($id)
    {
        $voiture = Voiture::findOrFail($id);
        $voiture->accessoires()->detach();
        $voiture->delete();
        return redirect()->back();
    }

    public function voituresAyantAccessoire($typeAccessoire)
    {
        $voitures = Voiture::with('user', 'accessoires')
            ->orderBy('voitures.created_at', 'desc')
            ->whereHas('accessoires', function ($q) use ($typeAccessoire) {
                $q->where('accessoires.type_url', $this->reecritureUrl(($typeAccessoire)));
            })->paginate($this->nbVoituresParPage);
        // return $voitures; // pour tester rapidement que la méthode fonctionne
        $links = $voitures->render();
        return view('view_voitures', compact('voitures', 'links'))
            ->with('info', 'Résultats pour la recherche de l\'accessoire : ' .
                $typeAccessoire);
    }

    public function reecritureUrl($string)
    {
        $accent =
            "ÀÁÂàÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâàäåæ" .
            "çèéêëìíîïðñòóôõöøùúûýýþÿ";
        $noAccent = "aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby";
        $reecriture = strtr(trim($string), $accent, $noAccent);
        $url = preg_replace("# #", "-", $reecriture);
        return  $url;
    }
}
