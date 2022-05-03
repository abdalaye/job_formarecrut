<div class="form-group">
    @php 
    if($validation) {
        $errorField = errorField($errors, $name);
    } else {
        $errorField = '';
    }
    @endphp 
    
    {!! Form::label($name, ($slot ?? \Illuminate\Support\Str::headline($name)), ['class' => 'control-label']) !!}
    
    @if($type == 'select')
    {!! Form::select($name, $options, null, ['class' => 'form-control '.$errorField]) !!}
    @elseif($type == 'textarea')
    {!! Form::textarea($name, null, ['class' => 'form-control '.$errorField, 'rows' => 5]) !!}
    @else 
    {!! Form::input($type, $name, null, ['class' => 'form-control '.$errorField]) !!}
    @endif

    @if($validation)
    @error($name) <span class="invalid-feedback">{{ $message }}</span> @enderror
    @endif
</div>