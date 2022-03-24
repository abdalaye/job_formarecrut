<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatsController extends Controller
{
    public function complets()
    {
       $title = "Candidats - Profils complets";
       $candidats = Candidat::where("statut", 1)
                    ->orderByDesc('created_at')
                    ->with('user')
                    ->get()
                    ->all();

        return view("admin.candidats.index", compact("title", "candidats"));
    }


    public function incomplets()
    {
        $title = "Candidats - Profils incomplets";
        $candidats = Candidat::where("statut", 0)
                    ->orderByDesc('created_at')
                    ->with('user')
                    ->get()
                    ->all();

        return view("admin.candidats.index", compact("title", "candidats"));
    }
}
