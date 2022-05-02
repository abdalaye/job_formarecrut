@extends('layouts.admin')

@section('content')
    
    @php
        $step = request('step', 1);
    @endphp

    <div class="col-md-12">
        <ul class="step d-flex flex-nowrap rounded py-3 bg-white shadow-sm">
            <li class="step-item {{ $step == 1 ? 'active' : '' }}">
                <a href="#!">Informations personnelles</a>
            </li>
            <li class="step-item {{ $step == 2 ? 'active' : '' }}">
                <a href="#!">Formations</a>
            </li>
            <li class="step-item {{ $step == 3 ? 'active' : '' }}">
                <a href="#!">Expériences professionnelles</a>
            </li>
            <li class="step-item {{ $step == 4 ? 'active' : '' }}">
                <a href="#!">Visualisation CV</a>
            </li>
        </ul>
    </div>

    <div class="col-md-12">
        <hr>
        <div class="card-body rounded bg-white">
            @switch($step)
                @case(1)
                    @include('shared.candidats.step1')
                    @break
                @case(2)
                    @include('shared.candidats.step2')
                    @break
            @endswitch
        </div>
    </div>
@endsection
