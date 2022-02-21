<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        $collaborateur = Auth::user()->collaborateur;
        $_type_documents = [];
        $_type_documents_consultations = [];

        $_document_deposes = [];
        $_document_recus = [];
        $_document_transmis = [];
        $_alertes = [];
        $is_admin = false;
        return view('admin.dashboard.index', compact('_type_documents','_document_deposes','_document_transmis','_alertes','_type_documents_consultations','is_admin'));
    }

}
