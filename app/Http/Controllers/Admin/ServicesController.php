<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiDataController as apiData;
use App\Models\Service;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with(['direction', 'departement'])->get()->all();
        return view('admin.services.index',compact('services'));
    }

    public function getServicesFromCentral() {
        if(apiData::saveOrUpdateServices()) {
            Session::flash('success', "Les services ont été mises à jour avec succès !");
        } else {
            Session::flash('error', "La mise à jour des services a échoué !");
        }
        return redirect()->route("admin.services.index");
    }
}
