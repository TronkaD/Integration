<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObjectifController extends Controller
{
    //
       // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES OBJECTIFS
       public function index(){
        $objectifs = Objectif::orderBy('titre')->get(); //RECUPERATION DE TOUTE LES OBJECTIFS PAR ORDRE ALPHABETIQUE
        return view('backend.objectif.index', compact('objectifs'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'AJOUT D'UNE NOUVELLE OBJECTIF
    public function new(){
        return view('backend.objectif.add');
    }

    // FUNCTION QUI AJOUT DES OBJECTIFS DANS LA BASE DE DONNES
    public function store(Request $request){

        //VALIDATION DES DONNEES
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|required|max:5000000',
            'titre' => 'required',
            'contenue' => 'required',
            'description' => 'required',
        ]);
        $imgPath = $request->file('image')->store('photos');
        /*INSTANCIATION DU MODEL OBJECTIF ET CREATION*/
        $objectif = Objectif::create([
            'image' => $imgPath,
            'titre' => $request->titre,
            'contenue' => $request->contenue,
            'description' => $request->description,

            // $request->name correspont à la valeur de l'attribut name dans l'input
        ]);

        /*SI L'ELEMENT A ETE CREE ALORS*/

        if ($objectif){
            return redirect()->route('index_objectif'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
        }
    }

    // FUNCTION QUI RETOURNE LA PAGE DE MODIFICATION D'UNE OBJECTIF
    public function update(Request $request, Objectif $objectif){
        return view('backend.objectif.update', compact('objectif'));
    }

    // FUNCTION QUI MODIFIE LES OBJECTIFS DANS LA BASE DE DONNES
    public function edit(Request $request, Objectif $objectif){
        //VALIDATION DES DONNEES
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:5000000',
            'titre' => 'required',
            'contenue' => 'required',
            'description' => 'required',
        ]);
        /*SI L'ELEMENT A ETE MODIFIE ALORS*/
        if($request->image != null){
            Storage::disk('public')->delete($objectif->image);
            $imgPath = $request->file('image')->store('photos');

            if ($objectif->update([
                'image' =>$imgPath,
                'titre' =>$request->titre,
                'contenue' =>$request->contenue,
                'description' =>$request->description
            ])){
                return redirect()->route('index_objectif'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
            }
        }else{
            if ($objectif->update([
                'titre' =>$request->titre,
                'contenue' =>$request->contenue,
                'description' =>$request->description
            ])){
                return redirect()->route('index_objectif'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
            }
        }

    }

    // FUNCTION QUI SUPPRIME LES OBJECTIFS DANS LA BASE DE DONNES
    public function delete(Objectif $objectif)
    {
        $objectif->delete(); //SUPPRESSION DE L'ELEMENT
        $reponse = response()->json([
            'Statuts' => 200,
            'Message' => 'Image supprimée'
        ]);
        return $reponse;
    }
}
