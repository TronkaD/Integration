<?php

namespace App\Http\Controllers;

use App\Models\Donnateur;
use App\Models\Donnation;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Objectif;
use Illuminate\Http\Request;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\Storage;
use Monarobase\CountryList\CountryListFacade;
class FrontendController extends Controller
{
    //FUNCTION QUI RETOURNE LA PAGE D'ACCEUIL COTE CLIENT
    public function index(){
        $objectifs = Objectif::orderBy('titre')->get(); //RECUPERATION DES OBJECTIFS
        $collaborateurs = Collaborateur::orderBy('id')->get(); //RECUPERATION DES COLLABORATEURS
        $classes = Classe::orderBy('id')->get(); //RECUPERATION DES classes

        return view('index', compact('objectifs', 'collaborateurs', 'classes'));
    }

    public function index_about(){
        $collaborateurs = Collaborateur::orderBy('id')->get(); //RECUPERATION DES COLLABORATEURS
        return view('about', compact('collaborateurs'));
    }

    public function download(){
        return Storage::download('file/status.pdf');
    }
    public function index_cause(){
        $objectifs = Objectif::orderBy('titre')->get(); //RECUPERATION DES OBJECTIFS
        $classes = Classe::orderBy('id')->get(); //RECUPERATION DES classes

        return view('causes', compact('objectifs','classes'));
    }
    public function show_student(Request $request){
        $classe_ = Classe::where('nom', urldecode($request->classe))->firstOrFail();
        $eleves = Eleve::where('classe_id',$classe_->id)->get();
        return view('classe', compact('eleves','classe_'));
    }

    public function infos_eleve(Request $request){
        $prenom =  urldecode($request->prenom);
        $nom =  urldecode($request->nom);
        $eleve = Eleve::where([
            ['nom', $nom],
            ['prenom', $prenom]
        ])->firstOrFail();

        return view('profil', compact('eleve'));
    }

    //FUNCTION QUI RETOURNE LA PAGE DONATE
    public function donate_page(){
        $countries = CountryListFacade::getList('en'); //RECUPERATION DES PAYS EN FRANCAIS
        return view('donate', compact('countries'));
    }


    //FUNCTION QUI PROCEDE A LA DONNATION
    public function make_donation(Request $request){
        //VALIDATION DES DONNEES
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'amount' => 'required|numeric',
        ]);
        $donnateur = Donnateur::create([
            'pays' => $request->country,
            'ville' => $request->city,
            'nom' => $request->lastname,
            'prenom' => $request->firstname,
            'email' => $request->email,
            'tel' => $request->phone,
            'status' => '',
        ]);
        if ($donnateur){
            $donnation = Donnation::create([
                'montant'=>$request->amount,
                'method'=>'stripe-card',
                'message'=>$request->message,
            ]);
            $donnation->donnateur()->associate($donnateur);
            $amount = $request->amount * 100; //MULTIPLICATION DU MONTANT DU DON
            if ($donnation->save()){
                if ($donnateur->charge($amount, $request->payment_method)){
                    return redirect('/donate')->with('message', 'Merci pour votre don!');
                }
            }
        }

    }
}
