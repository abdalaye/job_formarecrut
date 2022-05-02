<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('titre', 'Formation', ['class' => 'control-label']) !!}
            {!! Form::text('titre', null, ['class' => 'form-control '.errorField($errors, 'titre')]) !!}
            @error('titre') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('etablissement', 'Etablissement', ['class' => 'control-label']) !!}
            {!! Form::text('etablissement', null, ['class' => 'form-control '.errorField($errors, 'etablissement')]) !!}
            @error('etablissement') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('country_id', 'Pays', ['class' => 'control-label']) !!}
            {!! Form::select('country_id', ['' => 'Pays'] + \App\Models\Country::active()->pluck('name', 'id')->all(), null, ['class' => 'form-control '.errorField($errors, 'country_id')]) !!}
            @error('country_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            {!! Form::label('city_id', 'Ville', ['class' => 'control-label']) !!}
            {!! Form::select('city_id', ['' => 'Ville'] + \App\Models\City::active()->pluck('name', 'id')->all(), null, ['class' => 'form-control '.errorField($errors, 'city_id')]) !!}
            @error('city_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('date_debut', 'Date de début', ['class' => 'control-label']) !!}
            {!! Form::date('date_debut', null, ['class' => 'form-control '.errorField($errors, 'date_debut')]) !!}
            @error('date_debut') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <div class="d-flex align-items-center justify-content-between">
                {!! Form::label('date_fin', 'Date de fin', ['class' => 'control-label']) !!}

                <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('en_cours', '1', true, ['class' => 'custom-control-input']) !!}
                    {!! Form::label('en_cours', 'Présent', ['class' => 'custom-control-label']) !!}
                </div>
            </div>

            {!! Form::date('date_fin', null, ['class' => 'form-control '.errorField($errors, 'date_fin')]) !!}
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

