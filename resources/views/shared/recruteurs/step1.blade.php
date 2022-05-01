<form action="{{ route('admin.recruteurs.step1', $recruteur) }}" enctype="multipart/form-data" method="post"
    class="row" novalidate>

    @csrf
    @method('put')
    
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="logo"
                        class="d-block {{ $recruteur->photo ? 'border p-3' : 'jumbotron' }} text-center">

                        <a href="{{ $recruteur->logoUrl }}" data-fancybox="Profil du recruteur">
                            {{ $recruteur->logoImg(['alt' => 'Profil recruteur','class' => 'img-thumbnail img-rounded shadow img-size-64 d-block mx-auto mb-3']) }}
                        </a>

                        <span class="text-muted choosePhoto">Cliquez pour choisir un photo</span>

                        <span class="text-success photoChoosed d-none">
                            <i class="fas fa-check mr-2"></i> Une image a été bien choisie
                        </span>

                        <p>
                            <small class="small text-center text-muted">
                                Pour un meilleur rendu, veuillez choisir une photo au format carré.
                            </small>
                        </p>

                        <input 
                            type="file" 
                            name="logo"
                            id="logo"
                            accept=".png,.jpeg,.jpg" 
                            class="d-none" 
                        >

                        @error('logo')
                            <span class="font-weight-bold text-danger d-block text-center">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <input type="hidden" name="step" value="1">
                    <x-input-form-group
                        col='col-6'
                        name='nom'
                        label='Nom'
                        required='true'
                        value="{{ old('nom') ?? $recruteur->nom }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='ninea'
                        label='Ninea'
                        required='true'
                        value="{{ old('ninea') ?? $recruteur->ninea }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='rc'
                        label='RC'
                        required='true'
                        value="{{ old('rc') ?? $recruteur->rc }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='n_employers'
                        label="Nombre d'employés"
                        type="number"
                        required='true'
                        value="{{ old('n_employers') ?? $recruteur->n_employers }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='phone'
                        label="Numéro de téléphone"
                        required='true'
                        value="{{ old('phone') ?? $recruteur->phone }}">
                    </x-input-form-group>

                    <x-input-form-group
                        col='col-6'
                        name='adresse'
                        label="Adresse physique"
                        required='true'
                        value="{{ old('adresse') ?? $recruteur->adresse }}">
                    </x-input-form-group>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="form-group col-12">
        <label for="description" class="control-label">Description <span class="text-danger">*</span></label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>
        @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>


    <div class="text-right rounded px-2 py-3 border col-12">
        <button type="submit" name="action" value="save" class="btn btn-outline-primary mx-2">Enregistrer</button>
        <button type="submit" name="action" value="next" class="btn btn-outline-secondary ml-2">Suivant <i
                class="fas fa-arrow-circle-right ml-2"></i></button>
    </div>

</form>

@push('scripts')
    <script>
        $('body').on('change', '#logo', function(e) {
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
