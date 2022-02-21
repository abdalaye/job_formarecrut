@extends('layouts.admin')

@section('title', "Création d'un type de document")

@section('content')
    {{-- Contenu de la page --}}
    <div class="col-md-12 pt-2">
        @include("admin.parametres.type_documents.demarrage_document", ['creation' => true])
    </div>
@endsection