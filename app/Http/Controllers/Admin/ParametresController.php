<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametresController extends Controller
{
    public function typeDocuments() {
        $type_documents = \App\Models\TypeDocument::orderByDesc('id')->get();

        return view("admin.parametres.type_documents.index", compact("type_documents"));
    } 
}
