<div class="form-group">
    <label for="name{{ isset($from_modal) ? "Modal" : "" }}">Nom de la ville</label>
    <input type="text" name="name" id="name{{ isset($from_modal) ? "Modal" : "" }}" value="{{ old('name') ?? $city->name }}" class="form-control @error('name') is-invalid @enderror" required aria-describedby="nameHelp">
    <small id="nameHelp" class="text-muted">Veuillez saisir le nom de la ville</small>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
  <label for="country_id{{ isset($from_modal) ? "Modal" : "" }}">Pays de la ville</label>
  @include('partials.components.selectElement', [
      'options' => $_admin_countries,
      'display' => 'name',
      'required' => true,
      'id' => isset($from_modal) ? 'country_idModal' : 'country_id',
      'name' => 'country_id',
      'default' => old("country_id") ?? $city->country_id
  ])
</div>

<div class="form-group">
  <label for="statut{{ isset($from_modal) ? "Modal" : "" }}" class="d-block">Statut de la ville</label>
  @if (isset($from_modal))
    <select class="form-control" name="statut" id="statutModal">
        <option value="1">Actif</option>
        <option value="0">Inactif</option>
    </select>
  @else
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ $city->statut ? "checked" : "" }} name="statut" id="statut" value="1"> Actif
        </label>
    </div>
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ !$city->statut ? "checked" : "" }} name="statut" id="statut" value="0"> Inactif
        </label>
    </div>
  @endif
</div>
