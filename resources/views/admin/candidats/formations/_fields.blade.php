<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('titre', 'Formation', ['class' => 'control-label']) !!}
            {!! Form::text('titre', null, ['class' => 'form-control '.errorField($errors, 'titre'), 'required' => true]) !!}
            @error('titre') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('etablissement', 'Etablissement', ['class' => 'control-label']) !!}
            {!! Form::text('etablissement', null, ['class' => 'form-control '.errorField($errors, 'etablissement'), 'required' => true]) !!}
            @error('etablissement') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('country_id', 'Pays', ['class' => 'control-label']) !!}
            {!! Form::select('country_id', ['' => 'Pays'] + \App\Models\Country::active()->pluck('name', 'id')->all(), null, ['class' => 'form-control '.errorField($errors, 'country_id'), 'required' => true]) !!}
            @error('country_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            {!! Form::label('city_id', 'Ville', ['class' => 'control-label']) !!}
            {!! Form::select('city_id', ['' => 'Ville'] + \App\Models\City::active()->pluck('name', 'id')->all(), null, ['class' => 'form-control '.errorField($errors, 'city_id'), 'required' => true]) !!}
            @error('city_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('date_debut', 'Date de début', ['class' => 'control-label']) !!}
            {!! Form::date('date_debut', null, ['class' => 'form-control '.errorField($errors, 'date_debut'), 'required' => true]) !!}
            @error('date_debut') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <div class="d-flex align-items-center justify-content-between">
                {!! Form::label('date_fin', 'Date de fin', ['class' => 'control-label']) !!}

                <div class="custom-control custom-switch">
                    {!! Form::hidden('en_cours', '0') !!}
                    {!! Form::checkbox('en_cours', '1', $formation->en_cours, ['class' => 'custom-control-input', 'id' => 'en_cours' . ($formation->id ?: '')]) !!}
                    {!! Form::label('en_cours' . ($formation->id ?: ''), 'Présent', ['class' => 'custom-control-label']) !!}
                </div>
            </div>

            {!! Form::date('date_fin', null, ['class' => 'form-control '.errorField($errors, 'date_fin'), 'required' => true]) !!}
            @error('date_fin') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control '.errorField($errors, 'description'), 'rows' => 5]) !!}
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

