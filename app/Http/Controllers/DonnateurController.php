<?php

namespace App\Http\Controllers;

use App\Models\Donnateur;
use Illuminate\Http\Request;

class DonnateurController extends Controller
{
    //

       // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES DONNATEURS
       public function index(){
        $donnateurs = Donnateur::orderBy('nom')->get(); //RECUPERATION DE TOUTE LES DONNATEURS PAR ORDRE ALPHABETIQUE
        return view('backend.donnateur.index', compact('donnateurs'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'AJOUT D'UN NOUVEAU DONNATEUR
    public function new(){
        return view('backend.donnateur.add');
    }

    // FUNCTION QUI AJOUT DES DONNATEURS DANS LA BASE DE DONNES
    public function store(Request $request){
        
        //VALIDATION DES DONNEES
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'status' => 'required',
        ]);

        /*INSTANCIATION DU MODEL DONNATEUR ET CREATION*/
        $donnateur = Donnateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'tel' => $request->tel,
            'status' => $request->status,
            
            // $request->name correspont à la valeur de l'attribut name dans l'input
        ]);

        /*SI L'ELEMENT A ETE CREE ALORS*/

        if ($donnateur){
            return redirect()->route('index_donnateur'); //REDIRECTION VERS LA PAGE DE LA LISTE DES DONNATEURS
        }
    }

    // FUNCTION QUI RETOURNE LA PAGE DE MODIFICATION D'UN DONNATEUR
    public function update(Request $request, Donnateur $donnateur){
        return view('backend.donnateur.update', compact('donnateur'));
    }

    // FUNCTION QUI MODIFIE LES DONNATEURS DANS LA BASE DE DONNES
    public function edit(Request $request, Donnateur $donnateur){
      
            if ($donnateur->update([
                'nom' =>$request->nom,
                'prenom' =>$request->prenom,
                'email' =>$request->email,
                'tel' =>$request->tel,
                'status' =>$request->status
            ])){
                return redirect()->route('index_donnateur'); //REDIRECTION VERS LA PAGE DE LA LISTE DES DONNATEURS
            }
        
    }

    // FUNCTION QUI SUPPRIME LES DONNATEURS DANS LA BASE DE DONNES
    public function delete(Donnateur $donnateur)
    {
        $donnateur->delete(); //SUPPRESSION DE L'ELEMENT
        $reponse = response()->json([
            'Statuts' => 200,
            'Message' => 'Message supprimée'
        ]);
        return $reponse;
    }
}
