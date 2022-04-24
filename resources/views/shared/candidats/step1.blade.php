<form action="{{ route('admin.candidats.step1', $candidat) }}" enctype="multipart/form-data" method="post"
    class="row">
    @csrf
    @method("PATCH")
    <div class="col-md-12">
        {{-- {!! $errors !!} --}}
        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="row">
                    @include('partials.components.inputFormGroupElement', [
                        'col' => 'col-md-6',
                        'name' => 'prenom',
                        'label' => 'Prénom',
                        'required' => true,
                        'value' => old('prenom') ?? $candidat->prenom,
                    ])
                    @include('partials.components.inputFormGroupElement', [
                        'col' => 'col-md-6',
                        'name' => 'nom',
                        'label' => 'Nom de famille',
                        'required' => true,
                        'value' => old('nom') ?? $candidat->nom,
                    ])
                    @include('partials.components.inputFormGroupElement', [
                        'col' => 'col-md-6',
                        'name' => 'telephone',
                        'label' => 'Numéro de téléphone',
                        'required' => true,
                        'value' => old('telephone') ?? $candidat->telephone,
                    ])
                    @include(
                        'partials.components.selectFormGroupElement',
                        [
                            'options' => json_decode(
                                json_encode([
                                    ['id' => 1, 'name' => 'Homme'],
                                    ['id' => 2, 'name' => 'Femme'],
                                ])
                            ),
                            'display' => 'name',
                            'col' => 'col-md-6',
                            'required' => true,
                            'label' => 'Sexe',
                            'name' => 'genre',
                        ]
                    )
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-md-4',
        'name' => 'date_naissance',
        'label' => 'Date de naissance',
        'type' => 'date',
        'required' => true,
        'value' => old('date_naissance') ?? $candidat->date_naissance,
    ])

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-md-4',
        'name' => 'lieu_naissance',
        'label' => 'Lieu de naissance',
        'required' => true,
        'value' => old('lieu_naissance') ?? $candidat->lieu_naissance,
    ])

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-md-4',
        'name' => 'adresse',
        'label' => 'Adresse physique',
        'value' => old('adresse') ?? $candidat->adresse,
    ])

    @include('partials.components.selectFormGroupElement', [
        'options' => $_countries,
        'display' => 'name',
        'col' => 'col-md-6',
        'label' => 'Pays',
        'name' => 'country_id',
        'default' => old('country_id') ?? $candidat->country_id,
    ])
    @include('partials.components.selectFormGroupElement', [
        'options' => $_cities,
        'display' => 'name',
        'col' => 'col-md-6',
        'label' => 'Ville',
        'name' => 'city_id',
        'default' => old('city_id') ?? $candidat->city_id,
    ])

    <div class="text-right rounded px-2 py-3 border col-md-12">
        <button type="submit" name="action" value="save" class="btn btn-outline-primary mx-2">Enregistrer</button>
        <button type="submit" name="action" value="next" class="btn btn-outline-secondary ml-2">Suivant <i
                class="fas fa-arrow-circle-right ml-2"></i></button>
    </div>

</form>

@section('partialScript')
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
@endsection
