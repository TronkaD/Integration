<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EleveController extends Controller
{
       // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES ELEVES
       public function index(){
        $eleves = Eleve::orderBy('nom')->get(); //RECUPERATION DE TOUTE LES ELEVES PAR ORDRE ALPHABETIQUE
        return view('backend.eleve.index', compact('eleves'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'AJOUT D'UN NOUVEAU ELEVES
    public function new(){
        # RECUPERATION DE TOUTES LES CLASSES POUR LES AFFICHER DANS LE SELECT
        $classes = Classe::orderBy('nom')->get();
        return view('backend.eleve.add', compact('classes'));
    }

    // FUNCTION QUI AJOUT DES ELEVES DANS LA BASE DE DONNES
    public function store(Request $request){

        //VALIDATION DES DONNEES
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|required|max:5000000',
            'nom' => 'required',
            'prenom' => 'required',
            'date' => 'required',
            'lieu' => 'required',
            'select_sexe' => 'required',
            'select_classe'=> 'required'

        ]);
        $imgPath = $request->file('image')->store('eleves');
        /*INSTANCIATION DU MODEL ELEVE ET CREATION*/
        $eleve = Eleve::create([
            'image' => $imgPath,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date' => $request->date,
            'lieu' => $request->lieu,
            'sexe' => $request->select_sexe,
            // $request->name correspont à la valeur de l'attribut name dans l'input
        ]);
        $eleve->classe()->associate(Classe::find($request->select_classe));/*ASSOCIATION DE L'ELEVE A LA CLASSE TROUVEE*/

        /*SI L'ELEMENT A ETE CREE ALORS*/

        if ($eleve->save()){
            return redirect()->route('index_eleve'); //REDIRECTION VERS LA PAGE DE LA LISTE DES ELEVES
        }
    }

    // FUNCTION QUI RETOURNE LA PAGE D'INFORMATION D'UN ELEVE
    public function show(Request $request, Eleve $eleve){
        return view('backend.eleve.show', compact('eleve'));
    }


    // FUNCTION QUI RETOURNE LA PAGE DE MODIFICATION D'UN ELEVE
    public function update(Request $request, Eleve $eleve){
        # RECUPERATION DE TOUTES LES CLASSES POUR LES AFFICHER DANS LE SELECT
        $classes = Classe::orderBy('nom')->get();

        return view('backend.eleve.update', compact('eleve', 'classes'));
    }

    // FUNCTION QUI MODIFIE LES ELEVES DANS LA BASE DE DONNES
    public function edit(Request $request, Eleve $eleve){
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:5000000',
            'nom' => 'required',
            'prenom' => 'required',
            'date' => 'required',
            'lieu' => 'required',
            'select_sexe' => 'required',
            'select_classe'=> 'required'
        ]);

        /*SI L'ELEMENT A ETE MODIFIE ALORS*/
        if($request->image != null){
             //VALIDATION DES DONNEES
            Storage::disk('public')->delete($eleve->image);
            $imgPath = $request->file('image')->store('eleves');

            $eleve->update([
                'image' =>$imgPath,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'date' => $request->date,
                'lieu' => $request->lieu,
                'sexe' => $request->select_sexe,
            ]);
            $eleve->classe()->associate(Classe::find($request->select_classe));/*ASSOCIATION DE L'ELEVE A LA CLASSE TROUVEE*/

            if ($eleve->save()){
                return redirect()->route('index_eleve'); //REDIRECTION VERS LA PAGE DE LA LISTE DES ELEVES
            }
        }else{
            $eleve->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'date' => $request->date,
                'lieu' => $request->lieu,
                'sexe' => $request->select_sexe,
            ]);
            $eleve->classe()->associate(Classe::find($request->select_classe));/*ASSOCIATION DE L'ELEVE A LA CLASSE TROUVEE*/
            if ($eleve->save()){
 
                return redirect()->route('index_eleve'); //REDIRECTION VERS LA PAGE DE LA LISTE DES ELEVES
            }

        }

    }

    // FUNCTION QUI SUPPRIME LES ELEVES DANS LA BASE DE DONNES
    public function delete(Eleve $eleve)
    {
        $eleve->delete(); //SUPPRESSION DE L'ELEMENT
        $reponse = response()->json([
            'Statuts' => 200,
            'Message' => 'Image supprimée'
        ]);
        return $reponse;
    }
}
