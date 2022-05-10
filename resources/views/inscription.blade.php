@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row login_form bg-white mx-auto shadow animate__animated animate__fadeIn">

            @if (session('inscription_success'))
                @include('partials.element.inscription_success')
            @else
                @include('partials.element.inscription_component')
            @endif

            <footer class="col-md-12 d-flex justify-content-between py-2 px-3 text-secondary">
                <div>
                    <img src="{{ asset('img/logo.png') }}" alt="FormaRecrut" style="height: 45px"> &copy; FormaRecrut -
                    Tous droits réservés
                </div>
                <div>Conditions d'utilisation.</div>
            </footer>
        </div>

    </div>
@endsection
