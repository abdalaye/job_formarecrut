<select name="{{ $name }}" id="{{ isset($id) ? $id : $name }}" class="{{ isset($class) ? $class : 'form-control' }}  @error($name) is-invalid @enderror" {{ isset($required) ? 'required' : '' }}  {{ isset($multiple) ? 'multiple' : '' }}>
    @if (isset($empty) && $empty)
        <option value selected>{{ $empty }}</option>
    @endif
    @if (isset($first))
        <option value="tout">{{ $first }}</option>
    @endif
    @foreach ($options as $option)
    <option
    value="{{ $option->id }}"
    {{
        isset($multiple) ? (isset($value) && in_array($option->id, $value)? "selected" : "")
                            : (isset($value) && $value == $option->id ? "selected" : "") }}
    >{{ $option->{$display} }}</option>
    @endforeach
</select>

@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
