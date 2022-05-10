<form action="{{ route('inscription.recruteur') }}" method="post" class="form-tab row">
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
