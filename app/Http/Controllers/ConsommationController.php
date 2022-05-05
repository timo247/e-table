<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Support\Str;
use App\Models\Consommation;
use Illuminate\Http\Request;
use App\Http\Requests\ConsommationRequest;

class ConsommationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('canSeeEtablissement', ['only' => 'index']);
        $this->middleware('gerant', ['only' => 'destroy', 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($etablissementId)
    {
        $consommations = Consommation::where('etablissement_id', $etablissementId)
        ->paginate(10);
        $links = $consommations->render();
        //dd($consommations);
        return view('view_consommations', compact('consommations', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($etablissementId)
    {   
        return view('view_ajoute_consommation')->with('etablissementId', $etablissementId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsommationRequest $request)
    {
        $input = $request->input();
        //Pas besoin du timestamp
        //dd($input['etablissement_id']);
        $consommation = Consommation::create($input);
        //dd($consommation);
        $consommation->save();
        return view('view_confirmation_creation_consommation')->with('etablissementId', $input['etablissement_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consommation = Consommation::findOrFail($id);
        return view('view_show_consommation', compact('consommation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consommation = Consommation::findOrFail($id);
        return view('view_edit_consommation', compact('consommation'));

    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Consommation::findOrFail($id)->update($request->all());
        $consommation = Consommation::findOrFail($id);
        $etablissementId = $consommation -> etablissement_id;
        return redirect('consommations/'.$etablissementId)->withOk("L'utilisateur " . $request->input('name') . " a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consommation = Consommation::findOrFail($id);
        $consommation->delete();
        return redirect()->back();
    }
}
