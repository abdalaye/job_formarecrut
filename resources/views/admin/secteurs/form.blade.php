<div class="form-group">
    <label for="name">Nom du secteur</label>
    <input type="text" name="name" id="name{{ isset($from_modal) ? "Modal" : "" }}" value="{{ old('name') ?? $secteur->name }}" class="form-control @error('name') is-invalid @enderror" required aria-describedby="nameHelp">
    <small id="nameHelp" class="text-muted">Veuillez saisir le nom du secteur</small>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
  <label for="statut" class="d-block">Statut du secteur</label>
  @if (isset($from_modal))
    <select class="form-control" name="statut" id="statutModal">
        <option value="1">Actif</option>
        <option value="0">Inactif</option>
    </select>
  @else
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ $secteur->statut ? "checked" : "" }} name="statut" id="statut" value="1"> Actif
        </label>
    </div>
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ !$secteur->statut ? "checked" : "" }} name="statut" id="statut" value="0"> Inactif
        </label>
    </div>
  @endif
</div>
