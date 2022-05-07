<div class="form-group">
    @php $errorField = $validation ? errorField($errors, $name) : ''; @endphp 

    
    {!! Form::label($name, ($slot ?? \Illuminate\Support\Str::headline($name)), ['class' => 'control-label' . $attributes->has('required') ? 'required' : '']) !!}
    
    @if($type == 'select')
    {!! Form::select($name, ['' => 'Veuilez sélectionner'] + $options, null, $attributes->merge(['class' => 'form-control '.$errorField])->getAttributes()) !!}
    @elseif($type == 'textarea')
    {!! Form::textarea($name, null, $attributes->merge(['class' => 'form-control '.$errorField, 'rows' => 5])->getAttributes()) !!}
    @else 
    {!! Form::input($type, $name, null, $attributes->merge(['class' => 'form-control '.$errorField])->getAttributes()) !!}
    @endif

    @if($validation)
    @error($name) <span class="invalid-feedback">{{ $message }}</span> @enderror
    @endif
</div>