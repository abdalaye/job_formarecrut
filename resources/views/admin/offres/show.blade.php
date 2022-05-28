@extends('layouts.admin')
@section('title','Détails offre #' . $offre->id)

@section('content')
    @section('actions')
        <a href="{{ route('admin.offres.index') }}" class="btn btn-light rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
    @endsection


    <div class="col-md-12">
        <div class="card mb-4 shadow-none">
            <div class="card-body p-4">
                <h3 class="text-secondary h5 border-bottom border-secondary font-weight-bold">Détails de l'offre</h3>
                @include("admin.offres.fiche")
            </div>
        </div>
    </div>
@endsection
