<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    static function getCollaborateurMenus()
    {
        $sidebar = [
            "principals" =>
            [
                [
                    "name" => "Tableau de bord",
                    "fa" => "fa-tachometer-alt",
                    "route" => "home",
                ]
            ],
            "secondaires" => []
        ];

        return json_decode(json_encode($sidebar));
    }

    static function getAdminMenus()
    {
        $sidebar = [
            "principals" =>
            [
                [
                    "name" => "Tableau de bord",
                    "fa" => "fa-tachometer-alt",
                    "route" => "home",
                ]
            ],
            "secondaires" =>
            [
                [
                    "name" => "Recruteurs",
                    "fa" => "fa-user-tie",
                    // "withoutPrefix" => true,
                    // "variableCount" => "_nombre_depots_menu",
                    "refs" => ['recruteurs'],
                    "items" => [
                        [
                            "name" => "Actifs",
                            "route" => "admin.entreprises.actifs",
                            // "variableCount" => "_nombre_brouillons_menu",
                        ],
                        [
                            "name" => "Inactifs",
                            "route" => "admin.entreprises.inactifs",
                            // "variableCount" => "_nombre_soumis_menu",
                        ]
                    ]
                ],
                [
                    "name" => "Candidats",
                    "fa" => "fa-users",
                    // "withoutPrefix" => true,
                    // 'variableCount' => "_nombre_receptions_menu",
                    "refs" => ['candidats'],
                    "items" => [
                        [
                            "name" => "Profils complets",
                            "route" => "admin.candidats.complets",
                            // "variableCount" => "_nombre_brouillons_menu",
                        ],
                        [
                            "name" => "Profils incomplets",
                            "route" => "admin.candidats.incomplets",
                            // "variableCount" => "_nombre_soumis_menu",
                        ]
                    ]
                ],
                [
                    "name" => "Configurations",
                    "fa" => "fa-cog",
                    "header" => "Gestion des configurations",
                    "refs" => ["actions","parametres",'directions', 'services', 'postes', 'departements', "typedocuments"],
                    "items" => [
                        [
                            "name" => "Pays",
                            "url" => "admin.countries.index"
                        ],
                        [
                            "name" => "Villes",
                            "url" => "admin.cities.index"
                        ],
                        [
                            "name" => "Secteurs",
                            "route" => "admin.secteurs.index"
                        ],
                        [
                            "name" => "Niveaux études",
                            "url" => "admin.niveau_etudes.index"
                        ],
                        [
                            "name" => "Niveaux langues",
                            "url" => "admin.niveau_langues.index"
                        ],
                        [
                            "name" => "Niveaux compétences",
                            "url" => "admin.niveau_competences.index"
                        ],
                        [
                            "name" => "Type contrats",
                            "url" => "admin.type_contrats.index"
                        ],
                        [
                            "name" => "Abonnements",
                            "url" => "admin.abonnements.index"
                        ],
                    ]
                ],
            ]
        ];

        return json_decode(json_encode($sidebar));
    }
}
