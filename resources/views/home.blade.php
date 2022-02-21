@extends('layouts.admin')
@section('title')
    Tableau de Bord
@endsection

@section('content')
    {{-- Contenu de la page --}}
    <div class="col-md-12">
        <div class="card-body rounded jumbotron bg-white">
            <h1>Bienvenue dans votre Espace</h1>
            <p class="text-muted">
                Bonjour <?= $_user->nomComplet ?>
            </p>
            <hr>
            <a href="{{ route('compte') }}" style="color: white !important" class="shadow btn btn-lg btn-primary text-white">Voir mon profil</a>
        </div>
    </div>
@endsection
