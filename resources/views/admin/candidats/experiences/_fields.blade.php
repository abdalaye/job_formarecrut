<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('poste', 'Poste', ['class' => 'control-label']) !!}
            {!! Form::text('poste', null, ['class' => 'form-control '.errorField($errors, 'poste')]) !!}
            @error('poste') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('employeur', 'Employeur', ['class' => 'control-label']) !!}
            {!! Form::text('employeur', null, ['class' => 'form-control '.errorField($errors, 'employeur')]) !!}
            @error('employeur') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
            {!! Form::label('date_fin', 'Date de fin', ['class' => 'control-label']) !!}
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
