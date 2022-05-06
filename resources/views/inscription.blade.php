@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row login_form bg-white mx-auto shadow animate__animated animate__fadeIn">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body border-0">
                        <h1 class="h4 font-weight-bolder text-primary mb-2 border-bottom text-uppercase">Inscription</h1>
                        <ul class="nav nav-pills mb-3 nav nav-pills mb-3 bg-light p-2" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Je suis candidat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Je suis recruteur</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <form action="" method="post" class="form-tab row">
                                    @csrf
                                    <x-input-form-group col='col-md-6' name='prenom' label='Prénom' required='true'
                                        value="{{ old('prenom') ?? $candidat->prenom }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='nom' label='Nom de famille' required='true'
                                        value="{{ old('nom') ?? $candidat->nom }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='telephone' label='Numéro de téléphone'
                                        required='true' value="{{ old('telephone') ?? $candidat->telephone }}">
                                    </x-input-form-group>

                                    <x-select-form-group :options='$_genres' display='name' col='col-md-6' label='Sexe'
                                        name='genre' required='true' value="{{ old('genre') ?? $candidat->genre }}">
                                    </x-select-form-group>

                                    <hr class="col-11">

                                    <x-input-form-group col='col-md-12' type='email' name='email' label='Votre adresse email'
                                        required='true' value="{{ old('email') ?? $user->email }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='password' type="password" label='Votre mot de passe'
                                        required='true'>
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='password_confirmation'
                                        id="password-confirmation" label='Confirmez votre mot de passe' type="password" required='true'>
                                    </x-input-form-group>

                                    <div class="col-md-12 text-right">
                                        <button class="btn btn__login">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <form action="" method="post" class="form-tab row">
                                    @csrf
                                    <x-input-form-group col='col-md-6' name='prenom' label='Prénom' required='true'
                                        value="{{ old('prenom') }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='nom' label='Nom de famille' required='true'
                                        value="{{ old('nom') }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='nom_entreprise' label='Nom de votre entreprise'
                                        required='true' value="{{ old('nom_entreprise') }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='ninea' label='Ninéa de votre entreprise'
                                        required='true' value="{{ old('ninea') }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='rc' label='Registre de commerce de votre entreprise'
                                        required='true' value="{{ old('rc') }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' name='email' label='Votre adresse email'
                                        required='true' type="email" value="{{ old('email') }}">
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' type="password" name='password' label='Votre mot de passe'
                                        required='true'>
                                    </x-input-form-group>

                                    <x-input-form-group col='col-md-6' type="password" name='password_confirmation'
                                        id="password-confirmation" label='Confirmez votre mot de passe' required='true'>
                                    </x-input-form-group>

                                    <div class="col-md-12 text-right">
                                        <button class="btn btn__login">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
