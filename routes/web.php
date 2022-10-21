<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\DonnateurController;
use App\Http\Controllers\CollaborateurController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ROUTE DU FRONT-END
Route::get('/', [FrontendController::class, 'index'])->name('index_client');
Route::get('/about', [FrontendController::class, 'index_about'])->name('index_about');
Route::get('/causes', [FrontendController::class, 'index_cause'])->name('index_cause');
Route::get('/classes/{classe}', [FrontendController::class, 'show_student'])->name('show_student');
Route::get('/eleves/{nom}-{prenom}', [FrontendController::class, 'infos_eleve'])->name('infos_eleve');
Route::get('/download_status', [FrontendController::class, 'download'])->name('download');
Route::get('/contact', [MessageController::class, 'new'])->name('ajout_message');

/* Route::get('/about', function () {
    return view('about');
}); */

Route::get('/service', function () {
    return view('service');
});

/* Route::get('/contact', function () {
    return view('contact');
}); */

Route::get('/donate', [FrontendController::class, 'donate_page']);
Route::post('/make_donate', [FrontendController::class, 'make_donation'])->name('make_donation');
/* Route::get('/causes', function () {
    return view('causes');
}); */

// ROUTE DU FROND-END PAR RAPPORT AUX PROFIL D'UN ELEVE
Route::get('/profil', function () {
    return view('Liste.profil');
});

// ROUTE DU FROND-END PAR RAPPORT A LA LISTE
/* Route::get('/liste', function () {
    return view('list');
} */

/*ROUTES DU BACKEND */


/*
    Route::get('/', function () {
    return view('welcome');
    });
*/
Route::get('/dashboard', function () {
    return view('backend.index');
})->name('dashboard')->middleware('auth');

Route::get('/connect', function () {
    return view('auth.login');
});

/*ROUTES DU MODEL CLASSE*/
Route::get('dashboard/classes', [ClasseController::class, 'index'])->name('index_classe')->middleware('auth');
Route::get('dashboard/classes/nouvelle', [ClasseController::class, 'new'])->name('ajout_classe')->middleware('auth');
Route::post('dashboard/classes/store', [ClasseController::class, 'store'])->name('store_classe')->middleware('auth');
Route::get('dashboard/classes/update/{classe}', [ClasseController::class, 'update'])->name('update_classe')->middleware('auth');
Route::post('dashboard/classes/edit/{classe}', [ClasseController::class, 'edit'])->name('edit_classe')->middleware('auth');
Route::delete('dashboard/classes/delete/{classe}', [ClasseController::class, 'delete'])->name('delete_classe')->middleware('auth');

/*ROUTES DU MODEL OBJECTIF*/
Route::get('dashboard/objectifs', [ObjectifController::class, 'index'])->name('index_objectif')->middleware('auth');
Route::get('dashboard/objectifs/nouveau', [ObjectifController::class, 'new'])->name('ajout_objectif')->middleware('auth');
Route::post('dashboard/objectifs/store', [ObjectifController::class, 'store'])->name('store_objectif')->middleware('auth');
Route::get('dashboard/objectifs/update/{objectif}', [ObjectifController::class, 'update'])->name('update_objectif')->middleware('auth');
Route::post('dashboard/objectifs/edit/{objectif}', [ObjectifController::class, 'edit'])->name('edit_objectif')->middleware('auth');
Route::delete('dashboard/objectifs/delete/{objectif}', [ObjectifController::class, 'delete'])->name('delete_objectif')->middleware('auth');

/*ROUTES DU MODEL COLLABORATEUR*/
Route::get('dashboard/collaborateurs', [CollaborateurController::class, 'index'])->name('index_collaborateur')->middleware('auth');
Route::get('dashboard/collaborateurs/nouveau', [CollaborateurController::class, 'new'])->name('ajout_collaborateur')->middleware('auth');
Route::post('dashboard/collaborateurs/store', [CollaborateurController::class, 'store'])->name('store_collaborateur')->middleware('auth');
Route::get('dashboard/collaborateurs/update/{collaborateur}', [CollaborateurController::class, 'update'])->name('update_collaborateur')->middleware('auth');
Route::post('dashboard/collaborateurs/edit/{collaborateur}', [CollaborateurController::class, 'edit'])->name('edit_collaborateur')->middleware('auth');
Route::delete('dashboard/collaborateurs/delete/{collaborateur}', [CollaborateurController::class, 'delete'])->name('delete_collaborateur')->middleware('auth');

/*ROUTES DU MODEL DONNATEUR*/
Route::get('dashboard/donnateurs', [DonnateurController::class, 'index'])->name('index_donnateur')->middleware('auth');
Route::get('dashboard/donnateurs/nouvelle', [DonnateurController::class, 'new'])->name('ajout_donnateur')->middleware('auth');
Route::post('dashboard/donnateurs/store', [DonnateurController::class, 'store'])->name('store_donnateur')->middleware('auth');
Route::get('dashboard/donnateurs/update/{donnateur}', [DonnateurController::class, 'update'])->name('update_donnateur')->middleware('auth');
Route::post('dashboard/donnateurs/edit/{donnateur}', [DonnateurController::class, 'edit'])->name('edit_donnateur')->middleware('auth');
Route::delete('dashboard/donnateurs/delete/{donnateur}', [DonnateurController::class, 'delete'])->name('delete_donnateur')->middleware('auth');

/*ROUTES DU MODEL ELEVE*/
Route::get('dashboard/eleves', [EleveController::class, 'index'])->name('index_eleve')->middleware('auth');
Route::get('dashboard/eleves/nouveau', [EleveController::class, 'new'])->name('ajout_eleve')->middleware('auth');
Route::post('dashboard/eleves/store', [EleveController::class, 'store'])->name('store_eleve')->middleware('auth');
Route::get('dashboard/eleves/show/{eleve}', [EleveController::class, 'show'])->name('show_eleve')->middleware('auth');
Route::get('dashboard/eleves/update/{eleve}', [EleveController::class, 'update'])->name('update_eleve')->middleware('auth');
Route::post('dashboard/eleves/edit/{eleve}', [EleveController::class, 'edit'])->name('edit_eleve')->middleware('auth');
Route::delete('dashboard/eleves/delete/{eleve}', [EleveController::class, 'delete'])->name('delete_eleve')->middleware('auth');

/*ROUTES DU MODEL CLASSE*/

Route::get('dashboard/messages', [MessageController::class, 'index'])->name('index_message')->middleware('auth');
Route::post('dashboard/messages/store', [MessageController::class, 'store'])->name('store_message');
Route::delete('dashboard/messages/delete/{message}', [MessageController::class, 'delete'])->name('delete_message')->middleware('auth');

/*ROUTE DU MODEL USER*/
Route::post('dashboard/update-profil-img', [UserController::class, 'update_profil_image'])->name('update_profil_image')->middleware('auth');

/*CHECKOUT ROUTES*/
Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
