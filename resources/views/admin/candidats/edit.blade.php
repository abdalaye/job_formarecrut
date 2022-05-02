@extends('layouts.admin')

@section('content')
    
    <div class="col-12">
        <ul class="step d-flex flex-nowrap rounded py-3 bg-white shadow-sm">
            <li class="step-item {{ $step == 1 ? 'active' : '' }}">
                <a href="{{ route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 1, 'hash' => sha1($candidat->id)]) }}">Informations personnelles</a>
            </li>
            <li class="step-item {{ $step == 2 ? 'active' : '' }}">
                <a href="#!">Formations</a>
            </li>
            <li class="step-item {{ $step == 3 ? 'active' : '' }}">
                <a href="{{ route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 3, 'hash' => sha1($candidat->id)]) }}">Expériences professionnelles</a>
            </li>
            <li class="step-item {{ $step == 4 ? 'active' : '' }}">
                <a href="{{ route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 4, 'hash' => sha1($candidat->id)]) }}">Visualisation CV</a>
            </li>
        </ul>
    </div>

    <div class="col-12">
        <hr>
        <div class="card-body rounded bg-white">
            @switch($step)
                @case(1)
                    @include('shared.candidats.step1')
                    @break
                @case(2)
                    @include('shared.candidats.step2')
                    @break 
                @case(3)
                    @include('shared.candidats.step3')
                    @break
                @case(4)
                    @include('shared.candidats.step4')
                    @break
            @endswitch
        </div>
    </div>
@endsection
