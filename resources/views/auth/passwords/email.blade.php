@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row login_form bg-white mx-auto shadow animate__animated animate__fadeIn">
            <div class="col-md-6">
                <div class="card border-0 py-2">
                    <div class="card-header bg-white border-0 d-flex justify-content-start align-items-center">
                        <img src="{{ asset('img/logo.png') }}" class="mr-2" style="height: 35px" alt="logo">
                        <strong class="subTitle text-secondary font-weight-bolder h6 text-uppercase">Mot de passe oublié</strong>
                    </div>
                    <div class="img py-5">
                        <img class="animate__animated animate__zoomIn ml-3" src="{{ asset('img/frontend_images/forgot.svg') }}" alt="illustration">
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card border-0 card__login py-5 px-1">
                    <div class="card-body py-0 pl-3">
                        <div class="text-right">
                            <a href="javascript:history.back()" class="btn btn-sm btn-light"><i class="fas fa-chevron-circle-left"></i> Retour</a>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}" class="py-3 my-3">
                            @csrf
                            <h3 class="title text-primary mb-2">
                                Réinitialiser mon mot de passe
                            </h3>
                            <div class="form-group">
                                <label for="email">Saisir votre E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="adresse email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn__login shadow">
                                    {{ __('Envoyer le lien de réinitialisation') }}
                                </button>
                            </div>

                            <div class="form-group">
                                <small>Vous avez déjà un compte ? </small>
                                <a class="small" href="{{ route('login') }}">
                                    {{ __('Connexion') }}
                                </a>
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
