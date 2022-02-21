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
    return redirect(env("CENTRALISATION_LINK", "/login"));
});

Route::middleware('centralisation_auth')->any('loginRedirectFromCentral.json', [App\Http\Controllers\ApiCentralisationController::class, 'loginRedirectFromCentral'])->name('centralisation.redirect');
Auth::routes(['register' => false]);

Route::get('/tableau-de-bord', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/compte', function() {
        return view("users.profile");
    })->name('compte');

    Route::get('/recherche', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

    Route::delete('/pieces/{id}', [App\Http\Controllers\DocumentPiecesController::class, 'destroy'])->name("document_pieces.destroy");
    Route::get('/depot-document', [App\Http\Controllers\DocumentsController::class, 'create'])->name("documents.create");
    Route::prefix("documents")->name("documents.")->group(function() {
        Route::post('/', [App\Http\Controllers\DocumentsController::class, 'store'])->name("store");
        Route::get('/{ref}/modifier', [App\Http\Controllers\DocumentsController::class, 'edit'])->name("edit");
        Route::any('/{ref}/soumettre', [App\Http\Controllers\DocumentsController::class, 'soumettre'])->name("soumettre");
        Route::patch('/{document}/update', [App\Http\Controllers\DocumentsController::class, 'update'])->name("update");
        Route::get('/consultations', [App\Http\Controllers\DocumentsController::class, 'typeDocuments'])->name("consultations");
        Route::get('/consultations/traitements', [App\Http\Controllers\DocumentsController::class, 'consultations'])->name("consultations.traitements");
        Route::get('/validations', [App\Http\Controllers\DocumentsController::class, 'validations'])->name("validations");
        Route::get('/validations/{ref}', [App\Http\Controllers\DocumentsController::class, 'validerDocument'])->name("validations.show");
        Route::get('/consultations/{ref}', [App\Http\Controllers\DocumentsController::class, 'consulterDocument'])->name("consultations.show");
        Route::get('/consultations/{ref}/liste', [App\Http\Controllers\DocumentsController::class, 'consultationByTypeDocument'])->name("liste");


    });
    Route::prefix("mesdocuments")->name("mesdocuments.")->group(function() {
        Route::get('/brouillons', [App\Http\Controllers\DocumentsController::class, 'brouillons'])->name("brouillons");
        Route::get('/soumis', [App\Http\Controllers\DocumentsController::class, 'soumis'])->name("soumis");
        // Route::get('/clotures', [App\Http\Controllers\DocumentsController::class, 'clotures'])->name("clotures");
        Route::get('/{ref}/consultation', [App\Http\Controllers\DocumentsController::class, 'show'])->name("show");
    });

    Route::prefix("receptions")->name("receptions.")->group(function() {
        Route::resource('validations', App\Http\Controllers\ValidationsController::class);
        Route::get('/', [App\Http\Controllers\ValidationsController::class, 'receptions'])->name("receptions");
        Route::get('/{ref}/transmission', [App\Http\Controllers\ValidationsController::class, 'transmission'])->name("transmission");
        Route::resource('jalons', App\Http\Controllers\JalonsController::class);
        Route::post("/transmettre", [App\Http\Controllers\ValidationsController::class, 'transmettre'])->name("transmettre");
        Route::post("/cloturer", [App\Http\Controllers\ValidationsController::class, 'cloturerDocument'])->name("cloturer");

    });

    Route::middleware(['admin_middleware'])
            ->prefix("admin")
            ->name("admin.")
            ->group(function () {
        Route::prefix("parametres")->group(function() {
            Route::resource("typedocuments", App\Http\Controllers\Admin\TypeDocumentsController::class);
            Route::patch("typedocuments/{typedocument}/publish", [App\Http\Controllers\Admin\TypeDocumentsController::class, 'publish'])->name("typedocuments.publish");
            Route::resource("chainevalidations", App\Http\Controllers\Admin\ChaineValidationsController::class);
            Route::post("lignechaines", [App\Http\Controllers\Admin\ChaineValidationsController::class, 'addLine'])->name("lignechaines.store");
            Route::patch("lignechaines/{ligne}", [App\Http\Controllers\Admin\ChaineValidationsController::class, 'updateLine'])->name("lignechaines.update");
            Route::delete("lignechaines/{ligne}", [App\Http\Controllers\Admin\ChaineValidationsController::class, 'destroyLine'])->name("lignechaines.destroy");
            Route::resource('fields', App\Http\Controllers\Admin\FieldsController::class);
            Route::post('/fields/{plateforme_id}/ranger', [App\Http\Controllers\Admin\FieldsController::class, 'ranger'])->name('fields.ranger');
        });

        //Partials components
        Route::prefix("partials")->name("partials.")->group(function() {
            Route::get("typedocuments", [App\Http\Controllers\PartialsController::class, 'typeDocuments'])->name("type_documents");
        });

        Route::get('users', [App\Http\Controllers\UsersController::class, 'index'])->name('listUsers');
        Route::get('users/{user}/profil', [App\Http\Controllers\UsersController::class, 'show'])->name('showUser');
        Route::get('actions', [App\Http\Controllers\Admin\ActionsController::class, 'index'])->name("actions.index");
        Route::get('services', [App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('services.index');
        Route::get('updateServices', [App\Http\Controllers\Admin\ServicesController::class, 'getServicesFromCentral'])->name('services.update');
        Route::get('directions', [App\Http\Controllers\Admin\DirectionsController::class, 'index'])->name("directions.index");
        Route::get('updateDirections', [App\Http\Controllers\Admin\DirectionsController::class, 'getDirectionsFromCentral'])->name("directions.update");
        Route::get('departements', [App\Http\Controllers\Admin\DepartementsController::class, 'index'])->name("departements.index");
        Route::get('updateDepartements', [App\Http\Controllers\Admin\DepartementsController::class, 'getDepartementsFromCentral'])->name("departements.update");
        Route::get('documents/traitements', [App\Http\Controllers\DocumentsController::class, 'adminDocumentTraitements'])->name("documents.traitements");
        Route::get('documents/clotures', [App\Http\Controllers\DocumentsController::class, 'adminDocumentClotures'])->name("documents.clotures");
        Route::get('tableau-de-bord-admin', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name("admin-dashboard");
        Route::any('statistiques', [App\Http\Controllers\Admin\DashboardController::class, 'statistiques'])->name("statistiques");

    });

    Route::prefix("collaborateurs")
            ->name("collaborateurs.")
            ->group(function () {

    });
});
