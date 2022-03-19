<?php
namespace App\Http\View\Composers;

use App\Http\Controllers\Admin\MenusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer {

    //required method
    public function compose(View $view) {
        if(Auth::check()) {
            $extensions = config("app.extensions");
            $user = Auth::user();
            $sidebar = $user->is_admin ? MenusController::getAdminMenus() : MenusController::getCollaborateurMenus();
            $_admin_countries = \App\Models\Country::orderBy('name')->get()->all();


            $view->with([
                '_user' => $user,
                '_sidebar' => $sidebar,
                '_extensions' => $extensions,
                '_directions' => [],
                '_departements' => [],
                '_services' => [],
                '_collaborateurs' => [],
                '_type_fields' => [],
                '_nombre_depots_menu' => 0,
                '_nombre_soumis_menu' => 0,
                '_nombre_brouillons_menu' => 0,
                '_nombre_receptions_menu' => 0,
                '_nombre_suivi_menu' => 0,
                '_admin_countries' => $_admin_countries,
                // '_document_traites' => self::getDocumentsByStatutByCollaborateur(2), // statut en traitement 2
                // '_type_documents' => $type_documents,
                // '_document_tranmis' => self::getDocumentsByStatutByCollaborateur(3,3), //approuve 3, transmis 3 (validation_statut)
            ]);
        }
    }

}
