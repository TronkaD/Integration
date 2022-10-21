<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

       // FUNCTION QUI RETOURNE LA PAGE DE LA LISTE DES MESSAGES
       public function index(){
        $messages = Message::orderBy('id')->get(); //RECUPERATION DE TOUTE LES MESSAGES PAR ORDRE ALPHABETIQUE
        return view('backend.message.index', compact('messages'));
    }

    // FUNCTION QUI RETOURNE LA PAGE D'AJOUT D'UN NOUVEAU MESSAGE
    public function new(){
        return view('contact');
    } 

    // FUNCTION QUI AJOUT DES MESSAGES DANS LA BASE DE DONNES
    public function store(Request $request){
        
        //VALIDATION DES DONNEES
        $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'object' => 'required',
            'msg' => 'required',
        ]);

        /*INSTANCIATION DU MODEL MESSAGE ET CREATION*/
        $message = Message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'object' => $request->object,
            'msg' => $request->msg,
        ]);

        /*SI L'ELEMENT A ETE CREE ALORS*/

        if ($message){
            return redirect('/contact')->with('message', 'Votre message à été envoyé avec succès!'); 
        } 
    }

    /* // FUNCTION QUI RETOURNE LA PAGE DE MODIFICATION D'UN DONNATEUR
    public function update(Request $request, Donnateur $donnateur){
        return view('backend.donnateur.update', compact('donnateur'));
    } */

    // FUNCTION QUI MODIFIE LES DONNATEURS DANS LA BASE DE DONNES
    /* public function edit(Request $request, Donnateur $donnateur){
      
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
 */
    // FUNCTION QUI SUPPRIME LES DONNATEURS DANS LA BASE DE DONNES
    public function delete(Message $message)
    {
        $message->delete(); //SUPPRESSION DE L'ELEMENT
        $reponse = response()->json([
            'Statuts' => 200,
            'Message' => 'Message supprimée'
        ]);
        return $reponse;
    }
}
