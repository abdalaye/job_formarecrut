<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Http\Controllers\ApiDataController as apiData;
use Illuminate\Support\Facades\Session;
use App\Http\Custom\Log;
use Illuminate\Support\Facades\Auth;
class DirectionsController extends Controller
{
    public function index()
    {
        $directions = Direction::all();

        return view('admin.directions.index', compact('directions'));
    }

    public function getDirectionsFromCentral() {
        if(apiData::saveOrUpdateDirections()) {
            Session::flash('success', "Les directions ont été mises à jour avec succès !");
            Log::ACTION_GENEGAL("Mise à jour des directions", "L'admnistrateur " . Auth::user()->nom_complet . " a mis à jour les directions avec succés.");
        } else {
            Session::flash('error', "La mise à jour des directions a échoué !");
            Log::ACTION_GENEGAL("Mise à jour des directions", "L'admnistrateur " . Auth::user()->nom_complet . " a mis à jour les directions sans succés.");
        }
        return redirect()->route("admin.directions.index");
    }
}
