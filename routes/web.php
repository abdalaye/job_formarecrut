<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route("home");
    }
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/tableau-de-bord', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/compte', function() {
        return view("users.profile");
    })->name('compte');

    Route::get('/recherche', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

    Route::middleware(['admin_middleware'])
            ->prefix("admin")
            ->name("admin.")
            ->namespace('App\Http\Controllers\Admin')
            ->group(function () {
        Route::prefix("parametres")->group(function() {
            Route::resource("countries", CountriesController::class);
            Route::resource("cities", CitiesController::class);
            Route::resource("secteurs", SecteursController::class);
            Route::resource("niveau_langues", NiveauLanguesController::class);
            Route::resource("niveau_etudes", NiveauEtudesController::class);
            Route::resource("niveau_competences", NiveauCompetencesController::class);
            Route::resource("type_contrats", TypeContratsController::class);
            Route::resource("abonnements", AbonnementsController::class);
            Route::resource("situations", SituationsController::class);
        });
        Route::resource("users", UsersController::class);
        Route::get("users-incomplets", [UsersController::class, 'inactifs'])->name("users.inactifs");

        Route::get("candidats/complets", [CandidatsController::class, 'complets'])->name('candidats.complets');
        Route::get("candidats/incomplets", [CandidatsController::class, 'incomplets'])->name('candidats.incomplets');
        Route::get("candidats/{candidat}/profil", [CandidatsController::class, 'show'])->name('candidats.show');
        Route::get("candidats/{candidat}/modification", [CandidatsController::class, 'edit'])->name('candidats.edit');
        Route::patch("candidats/{candidat}/step1", [CandidatsController::class, 'step1'])->name('candidats.step1');
        Route::patch("candidats/{candidat}/step2", [CandidatsController::class, 'step2'])->name('candidats.step2');
        Route::patch("candidats/{candidat}/step3", [CandidatsController::class, 'step3'])->name('candidats.step3');

        Route::get("recruteurs/actifs", [RecruteursController::class, 'actifs'])->name('entreprises.actifs');
        Route::get("recruteurs/inactifs", [RecruteursController::class, 'inactifs'])->name('entreprises.inactifs');
    });

    Route::prefix("collaborateurs")
            ->name("collaborateurs.")
            ->group(function () {

    });
});
