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
                            "route" => "admin.recruteurs.actifs",
                            // "variableCount" => "_nombre_brouillons_menu",
                        ],
                        [
                            "name" => "Inactifs",
                            "route" => "admin.recruteurs.inactifs",
                            // "variableCount" => "_nombre_soumis_menu",
                        ]
                    ]
                ],
                [
                    "name" => "Offres",
                    "fa" => "fa-folder-open",
                    // "withoutPrefix" => true,
                    // "variableCount" => "_nombre_depots_menu",
                    "refs" => ['offres'],
                    "items" => [
                        [
                            "name" => "Offres publiées",
                            "route" => "admin.offres.index",
                            // "variableCount" => "_nombre_brouillons_menu",
                        ],
                        [
                            "name" => "Offres expirées",
                            "route" => "admin.offres.expired",
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
                    "name" => "Comptes",
                    "fa" => "fa-users",
                    // "withoutPrefix" => true,
                    // 'variableCount' => "_nombre_receptions_menu",
                    "refs" => ['users', "users-incomplets"],
                    "items" => [
                        [
                            "name" => "Utilisateurs actifs",
                            "route" => "admin.users.index",
                            // "variableCount" => "_nombre_brouillons_menu",
                        ],
                        [
                            "name" => "Utilisateurs inactifs",
                            "route" => "admin.users.inactifs",
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
                            "route" => "admin.countries.index"
                        ],
                        [
                            "name" => "Villes",
                            "route" => "admin.cities.index"
                        ],
                        [
                            "name" => "Secteurs",
                            "route" => "admin.secteurs.index"
                        ],
                        [
                            "name" => "FAQs",
                            "route" => "admin.faqs.index"
                        ],
                        [
                            "name" => "Niveaux études",
                            "route" => "admin.niveau_etudes.index"
                        ],
                        [
                            "name" => "Niveaux langues",
                            "route" => "admin.niveau_langues.index"
                        ],
                        [
                            "name" => "Niveaux compétences",
                            "route" => "admin.niveau_competences.index"
                        ],
                        [
                            "name" => "Type contrats",
                            "route" => "admin.type_contrats.index"
                        ],
                        [
                            "name" => "Types de situation",
                            "route" => "admin.situations.index"
                        ],
                        [
                            "name" => "Abonnements",
                            "route" => "admin.abonnements.index"
                        ],
                    ]
                ],
            ]
        ];

        return json_decode(json_encode($sidebar));
    }
}
