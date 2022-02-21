<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiDataController as apiData;
use App\Models\Departement;
use Illuminate\Support\Facades\Session;

class DepartementsController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return view('admin.departements.index', compact('departements'));
    }

    public function getDepartementsFromCentral() {
        if(apiData::saveOrUpdateDepartements()) {
            Session::flash('success', "Les départements ont été mises à jour avec succès !");
        } else {
            Session::flash('error', "La mise à jour des départements a échoué !");
        }
        return redirect()->route("admin.departements.index");
    }
}
