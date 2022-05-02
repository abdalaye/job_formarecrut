<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::label('formation', 'Formation', ['class' => 'control-label']) !!}
            {!! Form::text('formation', null, ['class' => 'form-control '.errorField($errors, 'formation')]) !!}
            @error('formation') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('etablissement', 'Etablissement', ['class' => 'control-label']) !!}
            {!! Form::text('etablissement', null, ['class' => 'form-control '.errorField($errors, 'etablissement')]) !!}
            @error('etablissement') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            {!! Form::label('ville', 'Ville', ['class' => 'control-label']) !!}
            {!! Form::text('ville', null, ['class' => 'form-control '.errorField($errors, 'ville')]) !!}
            @error('ville') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
