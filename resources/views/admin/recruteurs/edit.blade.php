@extends('layouts.admin')
@section('title', 'Recruteurs - Visualisation profil')

@section('content')
    @section('actions')
        <a href="javascript:history.back();" class="btn btn-light btn-sm rounded small"><i class="fas fa-angle-left m-2"></i> Retour</a> 
    @endsection
    <div class="col-12">
        <ul class="step d-flex flex-nowrap rounded py-3 bg-white shadow-sm">

            <li class="step-item {{ $step === 1 ? 'active' : '' }}">
                <a href="{{ route('admin.recruteurs.edit', ['entreprise' => $recruteur->id, 'step' => 1]) }}">
                    Informations personnelles
                </a>
            </li>

            <li class="step-item {{ $step === 2 ? 'active' : '' }}">
                <a href="{{ route('admin.recruteurs.edit', ['entreprise' => $recruteur->id, 'step' => 2]) }}">
                    Mon entreprise
                </a>
            </li>

            <li class="step-item {{ $step === 3 ? 'active' : '' }}">
                <a href="{{ route('admin.recruteurs.edit', ['entreprise' => $recruteur->id, 'step' => 3]) }}">
                    Personne morale
                </a>
            </li>

            <li class="step-item {{ $step === 4 ? 'active' : '' }}">
                <a href="{{ route('admin.recruteurs.edit', ['entreprise' => $recruteur->id, 'step' => 4]) }}">
                    Personne morale
                </a>
            </li>
        </ul>
    </div>

    <div class="col-12">
        <hr>
        <div class="card-body rounded bg-white">
            @switch($step)
                @case(1)
                    @include('shared.recruteurs.step1')
                    @break
                @case(2)
                    @include('shared.recruteurs.step2')
                    @break
                @case(3)
                    @include('shared.recruteurs.step3')
                    @break
                @case(4)
                    @include('shared.recruteurs.step4')
                    @break
            @endswitch
        </div>
    </div>
@endsection
