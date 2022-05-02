<form method="POST" action="{{ $url }}" style="display: inline;">
    @method($method)
    @csrf

    <button type="submit" {{ $attributes }}>
        {{ $slot }}
    </button>
</form>