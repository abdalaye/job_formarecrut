@extends('layouts.admin')
@section('title',"Candidats - Visualisation profil")

@section('content')
    @section('actions')
        <a href="javascript:history.back();" class="btn btn-light btn-sm rounded small"><i class="fas fa-angle-left m-2"></i> Retour</a>
    @endsection

    @include('shared.candidats.fiche')
@endsection
