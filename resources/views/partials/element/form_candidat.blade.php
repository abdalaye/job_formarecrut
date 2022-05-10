<form action="{{ route('inscription.candidat') }}" method="post" class="form-tab row">
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
