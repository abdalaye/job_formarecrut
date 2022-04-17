<div class="form-group {{ $col ?? '' }}">
    <label for="{{ $id ?? $name }}">{{ $label }} {!! isset($required) && $required ? '<span class="text-danger">*</span>' : '' !!}</label>
    @include('partials.components.selectElement', [
        'name' => $name,
        'display' => $display,
        'options' => $options,
        'id' => $id ?? $name
    ])
</div>
