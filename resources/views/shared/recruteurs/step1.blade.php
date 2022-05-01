<form action="{{ route('admin.recruteurs.step1', $recruteur) }}" enctype="multipart/form-data" method="post"
    class="row" novalidate>
    @csrf
    @method('put')
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="photo_upload"
                        class="d-block {{ $recruteur->photo ? 'border p-3' : 'jumbotron' }} text-center">
                        @if ($recruteur->logo)
                            <a href="{{ asset($recruteur->logo) }}" data-fancybox="Profil du recruteur">
                                <img src="{{ asset($recruteur->logo) }}"
                                    class="img-thumbnail img-rounded shadow img-size-64 d-block mx-auto"
                                    alt="Profil recruteur">
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

                        <input accept=".png,.jpeg,.jpg" type="file" name="logo"
                            class="form-control form-control-sm form-control-file d-none" id="photo_upload">

                        @error('logo')
                            <span class="font-weight-bold text-danger d-block text-center">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <input type="hidden" name="step" value="1">
                    <x-input-form-group
                        col='col-md-6'
                        name='nom'
                        label='Nom'
                        required='true'
                        value="{{ old('nom') ?? $recruteur->nom }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-md-6'
                        name='ninea'
                        label='Ninea'
                        required='true'
                        value="{{ old('ninea') ?? $recruteur->ninea }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-md-6'
                        name='rc'
                        label='RC'
                        required='true'
                        value="{{ old('rc') ?? $recruteur->rc }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-md-6'
                        name='n_employers'
                        label="Nombre d'employés"
                        type="number"
                        required='true'
                        value="{{ old('rc') ?? $recruteur->n_employers }}">
                    </x-input-form-group>
                    
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-md-4',
        'name' => 'phone',
        'label' => 'Numéro de téléphone',
        'required' => true,
        'value' => old('phone') ?? $recruteur->phone,
    ])

    @include('partials.components.inputFormGroupElement', [
        'col' => 'col-md-4',
        'name' => 'adresse',
        'label' => 'Adresse physique',
        'value' => old('adresse') ?? $recruteur->adresse,
    ])


    <div class="text-right rounded px-2 py-3 border col-md-12">
        <button type="submit" name="action" value="save" class="btn btn-outline-primary mx-2">Enregistrer</button>
        <button type="submit" name="action" value="next" class="btn btn-outline-secondary ml-2">Suivant <i
                class="fas fa-arrow-circle-right ml-2"></i></button>
    </div>

</form>

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
