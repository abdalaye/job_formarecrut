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
    return view("welcome");
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tableau-de-bord', [App\Http\Controllers\HomeController::class, 'index']);

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
            Route::resource("situations", App\Http\Controllers\Admin\SituationsController::class);
        });
        Route::resource("users", App\Http\Controllers\Admin\UsersController::class);
        Route::get("users-incomplets", [App\Http\Controllers\Admin\UsersController::class, 'inactifs'])->name("users.inactifs");

        Route::get("candidats/complets", [App\Http\Controllers\Admin\CandidatsController::class, 'complets'])->name('candidats.complets');
        Route::get("candidats/incomplets", [App\Http\Controllers\Admin\CandidatsController::class, 'incomplets'])->name('candidats.incomplets');
        Route::get("candidats/{candidat}/profil", [App\Http\Controllers\Admin\CandidatsController::class, 'show'])->name('candidats.show');
        Route::get("candidats/{candidat}/modification", [App\Http\Controllers\Admin\CandidatsController::class, 'edit'])->name('candidats.edit');
        Route::patch("candidats/{candidat}/step1", [App\Http\Controllers\Admin\CandidatsController::class, 'step1'])->name('candidats.step1');
        Route::patch("candidats/{candidat}/step2", [App\Http\Controllers\Admin\CandidatsController::class, 'step2'])->name('candidats.step2');
        Route::patch("candidats/{candidat}/step3", [App\Http\Controllers\Admin\CandidatsController::class, 'step3'])->name('candidats.step3');


        Route::get("recruteurs/complets", [App\Http\Controllers\Admin\RecruteursController::class, 'actifs'])->name('recruteurs.actifs');
        Route::get("recruteurs/incomplets", [App\Http\Controllers\Admin\RecruteursController::class, 'inactifs'])->name('recruteurs.inactifs');
        Route::get("recruteurs/{entreprise}/profil", [App\Http\Controllers\Admin\RecruteursController::class, 'show'])->name('recruteurs.show');
        Route::get("recruteurs/{entreprise}/modification", [App\Http\Controllers\Admin\RecruteursController::class, 'edit'])->name('recruteurs.edit');
        Route::put("recruteurs/{entreprise}/step1", [App\Http\Controllers\Admin\RecruteursController::class, 'step1'])->name('recruteurs.step1');
        Route::put("recruteurs/{entreprise}/step2", [App\Http\Controllers\Admin\RecruteursController::class, 'step2'])->name('recruteurs.step2');
        Route::put("recruteurs/{entreprise}/step3", [App\Http\Controllers\Admin\RecruteursController::class, 'step3'])->name('recruteurs.step3');

        Route::delete('recruteurs/{entreprise}/removeExperience/{pro_experience}', [
            App\Http\Controllers\Admin\RecruteursController::class, 'removeExperience'
        ])->name('recruteurs.removeExperience');

        Route::delete('recruteurs/{entreprise}/removeTraining/{training}', [
            App\Http\Controllers\Admin\RecruteursController::class, 'removeTraining'
        ])->name('recruteurs.removeTraining');


        Route::get('recruteurs/inactifs', [\App\Http\Controllers\Admin\InactiveRecruitersController::class, 'index'])->name('inactive_recruiters.index');
        Route::get('recruteurs/inactifs/{entreprise}/show', [\App\Http\Controllers\Admin\InactiveRecruitersController::class, 'show'])->name('inactive_recruiters.show');


        Route::get("recruteurs/inactifs", [App\Http\Controllers\Admin\RecruteursController::class, 'inactifs'])->name('entreprises.inactifs');
    });

    Route::prefix("collaborateurs")
            ->name("collaborateurs.")
            ->group(function () {

    });
});
