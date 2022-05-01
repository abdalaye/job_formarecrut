@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row login_form bg-white mx-auto shadow animate__animated animate__fadeIn">
            <div class="col-md-6">
                <div class="card border-0 py-2">
                    <div class="card-header bg-white border-0 d-flex justify-content-start align-items-center">
                        <img src="{{ asset('img/logo.png') }}" class="mr-2" style="height: 35px" alt="logo">
                        <strong class="subTitle text-secondary font-weight-bolder h6 text-uppercase">Authentification</strong>
                    </div>
                    <div class="img py-5">
                        <img class="animate__animated animate__zoomIn" src="{{ asset('img/frontend_images/login.svg') }}" alt="illustration">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 card__login py-5 px-1">
                    <div class="card-body py-0 pl-3">
                        <div class="text-right">
                            <a href="/" class="btn btn-sm btn-light"><i class="fas fa-chevron-circle-left"></i> Retour</a>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h3 class="title text-primary mb-2">
                                Se connecter
                            </h3>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Identifiant">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Mot de passe</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label small" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-block btn__login shadow">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>

                            <div class="form-group">
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="col-md-12 d-flex justify-content-between py-2 text-secondary">
                <div>&copy; FormaRecrut - Tous droits réservés</div>
                <div>Conditions d'utilisation.</div>
            </footer>
        </div>

    </div>
@endsection
