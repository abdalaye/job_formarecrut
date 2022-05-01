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

            $_countries = \App\Models\Country::active()->orderBy('name')->get()->all();
            $_cities = \App\Models\City::active()->orderBy('name')->get()->all();


            $view->with([
                '_user' => $user,
                '_sidebar' => $sidebar,
                '_extensions' => $extensions,
                '_directions' => [],
                '_departements' => [],
                '_services' => [],
                '_collaborateurs' => [],
                '_type_fields' => [],
                '_admin_countries' => $_admin_countries,
                '_countries' => $_countries,
                '_cities' => $_cities,
                '_genres' => self::getGenresSelect(),
                '_months' => self::getMonthsSelect(),
                '_years' => self::getYearsSelect(),
                // '_document_traites' => self::getDocumentsByStatutByCollaborateur(2), // statut en traitement 2
                // '_type_documents' => $type_documents,
                // '_document_tranmis' => self::getDocumentsByStatutByCollaborateur(3,3), //approuve 3, transmis 3 (validation_statut)
            ]);
        }
    }

    static function getGenresSelect() {
        return json_decode(
            json_encode([
                ['id' => 1, 'name' => 'Homme'],
                ['id' => 2, 'name' => 'Femme'],
            ])
        );
    }

    static function getMonthsSelect() 
    {
        return [
            [ 'name'  => 'Mois', 'value' => '' ],
            [ 'name'  => 'Janvier', 'value' => '01' ],
            [ 'name'  => 'Février', 'value' => '02' ],
            [ 'name'  => 'Mars', 'value' => '03' ],
            [ 'name'  => 'Avril', 'value' => '04' ],
            [ 'name'  => 'Mai', 'value' => '05' ],
            [ 'name'  => 'Juin', 'value' => '06' ],
            [ 'name'  => 'Juillet', 'value' => '07' ],
            [ 'name'  => 'Août', 'value' => '08' ],
            [ 'name'  => 'Septembre', 'value' => '09' ],
            [ 'name'  => 'Octobre', 'value' => '10' ],
            [ 'name'  => 'Novembre', 'value' => '11' ],
            [ 'name'  => 'Décembre', 'value' => '12' ],
        ];
    }

    static function getYearsSelect() 
    {
        $options   = [];
        $startYear = (int) now()->addYears('-65')->format('Y');
        $now       = (int) now()->format('Y');

        $options[] = ['name' => 'Année', 'value' => ''];
        
        for($i = $now; $i >= $startYear; $i--) {
            $options[] = [
                'name' => $i,
                'value' => $i
            ];
        }

        return $options;
    }

}
