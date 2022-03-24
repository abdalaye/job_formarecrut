@extends('layouts.admin')
@section('title','Nouveau plan d\'abonnement')

@section('content')
    @section('actions')
        <a href="javascript:history.back();" class="btn btn-light rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
    @endsection


    <div class="col-md-12">
        <div class="card mb-4 shadow-none">
            <div class="card-body">
                <h4 class="card-title">Remplissage formulaire d'ajout</h4>
                <form action="{{ route('admin.abonnements.store') }}" method="post" class="row">
                    @csrf
                    @include('admin.abonnements.form')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scriptBottom')
@endsection
