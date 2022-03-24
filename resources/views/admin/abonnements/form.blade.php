<div class="form-group col-12">
    <label for="name">Libellé</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $abonnement->name }}" class="form-control @error('name') is-invalid @enderror" required aria-describedby="nameHelp">
    <small id="nameHelp" class="text-muted">Veuillez saisir le libellé du plan d'abonnement</small>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
  <label for="country_id">Pays de la ville</label>
  @include('partials.components.selectElement', [
      'options' => $_admin_countries,
      'display' => 'name',
      'required' => true,
      'id' => isset($from_modal) ? 'country_idModal' : 'country_id',
      'name' => 'country_id',
      'default' => old("country_id") ?? $abonnement->country_id
  ])
</div>

<div class="form-group">
  <label for="statut" class="d-block">Statut de la ville</label>
  @if (isset($from_modal))
    <select class="form-control" name="statut" id="statutModal">
        <option value="1">Actif</option>
        <option value="0">Inactif</option>
    </select>
  @else
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ $abonnement->statut ? "checked" : "" }} name="statut" id="statut" value="1"> Actif
        </label>
    </div>
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ !$abonnement->statut ? "checked" : "" }} name="statut" id="statut" value="0"> Inactif
        </label>
    </div>
  @endif
</div>
