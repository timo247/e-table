<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtablissementController extends Controller
{
    public function showEtablissements(){
        $user = Auth::user();
        $etablissements = User::findOrFail($user->id)->etablissements()->get();
        //dd($etablissements);
        return view('view_select_etablissement')->with('etablissements', $etablissements);
    }
}
