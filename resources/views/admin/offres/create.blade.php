@extends('layouts.admin')
@section('title','Création offre')

@section('content')
    @section('actions')
        <a href="{{ route('admin.offres.index') }}" class="btn btn-light rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
    @endsection


    <div class="col-md-12">
        <div class="card mb-4 shadow-none">
            <div class="card-body">
                <form action="{{ route('admin.offres.store') }}" method="post">
                    @csrf
                    @include('admin.recruteurs.offres._fields', ['includeEntreprises' => true])

                    <div class="text-right">
                        <hr>
                        <button class="btn btn-secondary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
