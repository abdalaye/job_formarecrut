<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartialsController extends Controller
{
    public function typeDocuments() {
        $type_documents = \App\Models\TypeDocument::orderByDesc('id')->get();

        return view("partials.element.type_documents", compact("type_documents"));
    }
}
