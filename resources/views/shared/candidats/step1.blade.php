@section('title', 'Candidats - Informations personnelles')

@section('actions')
    <a href="javascript:history.back();" class="btn btn-light btn-sm rounded small"><i class="fas fa-angle-left m-2"></i>
        Retour</a>
@endsection

{!! Form::model($candidat, ['method' => 'patch', 'route' => ['admin.candidats.step1', $candidat], 'files' => true, 'class' => 'row']) !!}
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="photo_upload"
                        class="d-block {{ $candidat->photo ? 'border p-3' : 'jumbotron' }} text-center">
                        @if ($candidat->photo)
                            <a href="{{ asset($candidat->photo) }}" data-fancybox="Profil du candidat">
                                <img src="{{ asset($candidat->photo) }}"
                                    class="img-thumbnail img-rounded shadow img-size-64 d-block mx-auto"
                                    alt="Profil candidat">
                            </a>
                        @endif
                        <span class="text-muted choosePhoto">Cliquez pour choisir un photo</span>
                        <span class="text-success photoChoosed d-none"> <i class="fas fa-check mr-2"></i> Une image a été
                            bien choisie</span>
                        <p>
                            <small class="small text-center text-muted">
                                Pour un meilleur rendu, veuillez choisir une photo au format carré.
                            </small>
                        </p>
                        <input accept=".png,.jpeg,.jpg" type="file" name="photo_upload"
                            class="form-control form-control-sm form-control-file d-none" id="photo_upload">
                        @error('photo_upload')
                            <span class="font-weight-bold text-danger d-block text-center">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <x-input-form-group
                        col='col-6'
                        name='prenom'
                        label='Prénom'
                        required='true'
                        value="{{ old('prenom') ?? $candidat->prenom }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='nom'
                        label='Nom de famille'
                        required='true'
                        value="{{ old('nom') ?? $candidat->nom }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='telephone'
                        label='Numéro de téléphone'
                        required='true'
                        value="{{ old('telephone') ?? $candidat->telephone }}">
                    </x-input-form-group>

                    <x-select-form-group
                        :options='$_genres'
                        display='name'
                        col='col-6'
                        label='Sexe'
                        name='genre'
                        required='true'
                        value="{{ old('genre') ?? $candidat->genre }}">
                    </x-select-form-group>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-4',
        'name' => 'date_naissance',
        'label' => 'Date de naissance',
        'type' => 'date',
        'required' => true,
        'value' => old('date_naissance') ?? $candidat->date_naissance,
    ])

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-4',
        'name' => 'lieu_naissance',
        'label' => 'Lieu de naissance',
        'required' => true,
        'value' => old('lieu_naissance') ?? $candidat->lieu_naissance,
    ])

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-4',
        'name' => 'adresse',
        'label' => 'Adresse physique',
        'value' => old('adresse') ?? $candidat->adresse,
    ])

    @include('partials.components.selectFormGroupElement', [
        'options' => $_countries,
        'display' => 'name',
        'col' => 'col-6',
        'label' => 'Pays',
        'name' => 'country_id',
        'value' => old('country_id') ?? $candidat->country_id,
    ])
    @include('partials.components.selectFormGroupElement', [
        'options' => $_cities,
        'display' => 'name',
        'col' => 'col-6',
        'label' => 'Ville',
        'name' => 'city_id',
        'value' => old('city_id') ?? $candidat->city_id,
    ])

    <div class="col-4">
        <x-field type="select" name="niveau_etude_id" :options="['' => 'Niveau d\'étude'] + \App\Models\NiveauEtude::active()->pluck('name', 'id')->all()" :validation="true" required>
            Niveau d'étude
        </x-field>
    </div>

    <div class="col-4">
        <x-field type="select" name="situation_id" :options="['' => 'Situation'] + \App\Models\Situation::active()->pluck('name', 'id')->all()" :validation="true" required>
            Situation
        </x-field>
    </div>

    <div class="col-4">
        <x-field type="select" name="annee_experience" :options="['' => 'Année d\'expérience'] + flatSelect(1, 30)" :validation="true" required>
            Année d'expérience
        </x-field>
    </div>

    <div class="form-group col-12">
        <label for="info" class="control-label">Infos</label>
        <textarea name="info" id="info" cols="30" rows="5" class="form-control {{ errorField($errors, 'info') }}">{{ old('info') ?? $candidat->info }}</textarea>
        @error('info') <span class="invalid-feedback">{{ $message }}</span>@enderror
        <span class="form-text text-muted">
            Vous pouvez évoquer votre expérience, votre domaine d’activité ou vos compétences. Certains choisissent aussi de parler de leurs accomplissements ou de leurs postes précédents.
        </span>
    </div>

    <div class="text-right rounded px-2 py-3 border col-12">
        <button type="submit" name="action" value="save" class="btn btn-outline-primary mx-2">Enregistrer</button>
        <button type="submit" name="action" value="next" class="btn btn-outline-secondary ml-2">Suivant <i class="fas fa-arrow-circle-right ml-2"></i></button>
    </div>

{!! Form::close() !!}

@push('scripts')
    <script>
        $('body').on('change', '#photo_upload', function(e) {
            let val = $(this).val().trim();
            if (val && val !== "") {
                $('.choosePhoto').addClass('d-none');
                $('.photoChoosed').removeClass('d-none');
            } else {
                $('.photoChoosed').addClass('d-none');
                $('.choosePhoto').removeClass('d-none');
            }
        });
    </script>
@endPush
