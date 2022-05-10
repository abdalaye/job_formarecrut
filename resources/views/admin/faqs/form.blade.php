<x-input-form-group name='question' label='Veuillez saisir la question de cette FAQ' required='true' :value="old('question') ?? $faq->question">
</x-input-form-group>

<div class="form-group">
    <label for="statut" class="d-block">Statut de la FAQ</label>

    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ $faq->statut ? 'checked' : '' }} name="statut" id="statut"
                value="1"> Actif
        </label>
    </div>
    <div class="form-check form-check-inline border pointer-event p-2 rounded">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" {{ !$faq->statut ? 'checked' : '' }} name="statut" id="statut"
                value="0"> Inactif
        </label>
    </div>
</div>

<div class="form-group">
    <label for="description">Veuillez saisir la réponse de cette FAQ <span class="text-danger">*</span></label>
    <textarea name="answer" id="description" required class="form-control" rows="10">
      {{ old('answer') ?? $faq->answer }}
  </textarea>
    @error('answer')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            // uiColor: '#E36835'
        });
    </script>
@endpush
