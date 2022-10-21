<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class ListeController extends Controller
{
     //FUNCTION QUI RETOURNE LA LISTE DES ELEVES COTE CLIENT
     public function index(){
        $eleves = Eleve::orderBy('id')->get(); //RECUPERATION DES ELEVES

        return view('list', compact('eleves'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'INFORMATION D'UN ELEVE
    public function show(Request $request, Eleve $eleve){
        return view('Liste.profil', compact('eleve'));
    }

}
