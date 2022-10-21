<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborateur;

class CollabController extends Controller
{
    // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES COLLABORATEURS
    public function index(){
        $collaborateurs = Collaborateur::orderBy('nomComplet')->get(); //RECUPERATION DE TOUTE LES COLLABORATEURS PAR ORDRE ALPHABETIQUE
        return view('index', compact('collaborateurs'));
    }
}
