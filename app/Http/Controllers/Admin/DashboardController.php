<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Models\Document;
use App\Models\TypeDocument;
use App\Models\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends ControllersDashboardController
{
    public function dashboard(){

        $collaborateur = Auth::user()->collaborateur;
        $_type_documents = TypeDocument::typesDocuments()->get();
        $_type_documents_consultations = $collaborateur->authorisedConsultationTypeDocuments;

        $_document_deposes = Document::deposes()->get();
        $_document_recus = Validation::recus()->get();
        $_document_transmis = Validation::transmis()->get();
        $_alertes = Validation::documentsEnAlerte()->get();
        $is_admin = true;
        return view('admin.dashboard.index', compact('_type_documents','_document_deposes','_document_transmis','_alertes','_type_documents_consultations','is_admin'));
    }

    public function statistiques(Request $request){
        $type_documents = TypeDocument::typesDocuments()->get();
        $date_fin = Carbon::now()->format('Y-m-d');
        $date_debut = Carbon::now()->firstOfMonth()->format('Y-m-d');
        $annee_en_cours = Carbon::now()->format('Y');
        $documents_traites = Document::clotures()->get();
        $duree_moyenne = Document::dureeMoyenne();
        $duree_moyenne_collaborateur = Validation::dureeMoyenne();
        if($request->all()){
            $date_fin = Carbon::createFromFormat('Y-m-d', request('date_fin'));
            $date_fin = $date_fin->format('Y-m-d');
            $date_debut = Carbon::createFromFormat('Y-m-d', request('date_debut'));
            $date_debut = $date_debut->format('Y-m-d');

            $documents_traites = Document::clotures()->get();
        }
        return view('admin.dashboard.statistiques',compact('type_documents','documents_traites','date_debut','date_fin','annee_en_cours','duree_moyenne','duree_moyenne_collaborateur','type_documents'));
    }

}
