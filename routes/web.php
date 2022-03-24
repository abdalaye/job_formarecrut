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
            ->group(function () {
        Route::prefix("parametres")->group(function() {
            Route::resource("countries", App\Http\Controllers\Admin\CountriesController::class);
            Route::resource("cities", App\Http\Controllers\Admin\CitiesController::class);
            Route::resource("secteurs", App\Http\Controllers\Admin\SecteursController::class);
            Route::resource("niveau_langues", App\Http\Controllers\Admin\NiveauLanguesController::class);
            Route::resource("niveau_etudes", App\Http\Controllers\Admin\NiveauEtudesController::class);
            Route::resource("niveau_competences", App\Http\Controllers\Admin\NiveauCompetencesController::class);
            Route::resource("type_contrats", App\Http\Controllers\Admin\TypeContratsController::class);
            Route::resource("abonnements", App\Http\Controllers\Admin\AbonnementsController::class);
        });

        Route::get("candidats/complets", [App\Http\Controllers\Admin\CandidatsController::class, 'complets'])->name('candidats.complets');
        Route::get("candidats/incomplets", [App\Http\Controllers\Admin\CandidatsController::class, 'incomplets'])->name('candidats.incomplets');
        Route::get("candidats/{candidat}/profil", [App\Http\Controllers\Admin\CandidatsController::class, 'show'])->name('candidats.show');

        Route::get("recruteurs/actifs", [App\Http\Controllers\Admin\RecruteursController::class, 'actifs'])->name('entreprises.actifs');
        Route::get("recruteurs/inactifs", [App\Http\Controllers\Admin\RecruteursController::class, 'inactifs'])->name('entreprises.inactifs');
    });

    Route::prefix("collaborateurs")
            ->name("collaborateurs.")
            ->group(function () {

    });
});
