<div class="form-group {{ $col ?? '' }}">
    <label for="{{ $id ?? $name }}">{{ $label }} {!! isset($required) && $required ? '<span class="text-danger">*</span>' : '' !!}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $id ?? $name }}"
        value="{{ $value }}" class="form-control @error($name) is-invalid @enderror"
        {{ isset($required) && $required ? 'required' : '' }}>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
