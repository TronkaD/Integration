<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\Storage;

class CollaborateurController extends Controller
{
    //
     //
       // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES COLLABORATEURS
       public function index(){
        $collaborateurs = Collaborateur::orderBy('nomComplet')->get(); //RECUPERATION DE TOUTE LES COLLABORATEURS PAR ORDRE ALPHABETIQUE
        return view('backend.collaborateur.index', compact('collaborateurs'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'AJOUT D'UN NOUVEAU COLLABORATEUR
    public function new(){
        return view('backend.collaborateur.add');
    }

    // FUNCTION QUI AJOUT DES COLLABORATEURS DANS LA BASE DE DONNES
    public function store(Request $request){

        //VALIDATION DES DONNEES
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|required|max:5000000',
            'nomComplet' => 'required',
            'poste' => 'required',
            'email' => 'required',
        ]);
        $imgPath = $request->file('image')->store('collaborateurs');
        /*INSTANCIATION DU MODEL COLLABORATEUR ET CREATION*/
        $collaborateur = Collaborateur::create([
            'image' => $imgPath,
            'nomComplet' => $request->nomComplet,
            'poste' => $request->poste,
            'email' => $request->email,

            // $request->name correspont à la valeur de l'attribut name dans l'input
        ]);

        /*SI L'ELEMENT A ETE CREE ALORS*/

        if ($collaborateur){
            return redirect()->route('index_collaborateur'); //REDIRECTION VERS LA PAGE DE LA LISTE DES COLLABORATEURS
        }
    }

    // FUNCTION QUI RETOURNE LA PAGE DE MODIFICATION D'UN COLLABORATEUR
    public function update(Request $request, Collaborateur $collaborateur){
        return view('backend.collaborateur.update', compact('collaborateur'));
    }

    // FUNCTION QUI MODIFIE LES COLLABORATEURS DANS LA BASE DE DONNES
    public function edit(Request $request, Collaborateur $collaborateur){
        //VALIDATION DES DONNEES
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:5000000',
            'nomComplet' => 'required',
            'poste' => 'required',
            'email' => 'required',
        ]);

        /*SI L'ELEMENT A ETE MODIFIE ALORS*/
        if($request->image != null){

            Storage::disk('public')->delete($collaborateur->image);
            $imgPath = $request->file('image')->store('collaborateurs');

            if ($collaborateur->update([
                'image' =>$imgPath,
                'nomComplet' =>$request->nomComplet,
                'poste' =>$request->poste,
                'email' =>$request->email
            ])){
                return redirect()->route('index_collaborateur'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
            }
        }else{
            if ($collaborateur->update([
                'nomComplet' =>$request->nomComplet,
                'poste' =>$request->poste,
                'email' =>$request->email
            ])){
                return redirect()->route('index_collaborateur'); //REDIRECTION VERS LA PAGE DE LA LISTE DES OBJECTIFS
            }
        }

    }

    // FUNCTION QUI SUPPRIME LES COLLABORATEURS DANS LA BASE DE DONNES
    public function delete(Collaborateur $collaborateur)
    {
        $collaborateur->delete(); //SUPPRESSION DE L'ELEMENT
        $reponse = response()->json([
            'Statuts' => 200,
            'Message' => 'Image supprimée'
        ]);
        return $reponse;
    }
}
