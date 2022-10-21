<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClasseController extends Controller
{
    //
    // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES OBJECTIFS
    public function index(){
        $classes = Classe::orderBy('id')->get(); //RECUPERATION DE TOUTE LES OBJECTIFS PAR ORDRE ALPHABETIQUE
        return view('backend.classe.index', compact('classes'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'AJOUT D'UNE NOUVELLE OBJECTIF
    public function new(){
        return view('backend.classe.add');
    }

    // FUNCTION QUI AJOUT DES OBJECTIFS DANS LA BASE DE DONNES
    public function store(Request $request){

        //VALIDATION DES DONNEES
        $request->validate([
            'nom' => 'required',
            'image' => 'mimes:jpeg,jpg,png|required|max:5000000',
        ]);
        $imgPath = $request->file('image')->store('classes');
        /*INSTANCIATION DU MODEL OBJECTIF ET CREATION*/
        $classe = Classe::create([
            'nom' => $request->nom,
            'image' => $imgPath,
            // $request->name correspont à la valeur de l'attribut name dans l'input
        ]);

        /*SI L'ELEMENT A ETE CREE ALORS*/

        if ($classe){
            return redirect()->route('index_classe'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
        }
    }

    // FUNCTION QUI RETOURNE LA PAGE DE MODIFICATION D'UNE OBJECTIF
    public function update(Request $request, Classe $classe){
        return view('backend.classe.update', compact('classe'));
    }

    // FUNCTION QUI MODIFIE LES OBJECTIFS DANS LA BASE DE DONNES
    public function edit(Request $request, Classe $classe){
        //VALIDATION DES DONNEES
        $request->validate([
            'nom' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:5000000',
        ]);
        /*SI L'ELEMENT A ETE MODIFIE ALORS*/
        if($request->image != null){
            Storage::disk('public')->delete($classe->image);
            $imgPath = $request->file('image')->store('classes');

            if ($classe->update([
                'nom' =>$request->nom,
                'image' =>$imgPath,
            ])){
                return redirect()->route('index_classe'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
            }
        }else{
            if ($classe->update([
                'nom' =>$request->nom,
                
            ])){
                return redirect()->route('index_classe'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
            }
        }

    }

    // FUNCTION QUI SUPPRIME LES OBJECTIFS DANS LA BASE DE DONNES
    public function delete(Classe $classe)
    {
        $classe->delete(); //SUPPRESSION DE L'ELEMENT
        $reponse = response()->json([
            'Statuts' => 200,
            'Message' => 'Image supprimée'
        ]);
        return $reponse;
    }
}


