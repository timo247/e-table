<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsommationRequest;
use App\Models\Voiture;
use App\Models\Consommation;
use Illuminate\Http\Request;

class ConsommationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accesEtablissement');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
