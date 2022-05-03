<x-input-form-group name='question' label='Veuillez saisir la question de cette FAQ' required='true'
    value="{{ old('question') ?? $faq->question }}">
</x-input-form-group>

<div class="form-group">
    <label for="description">Veuillez saisir la réponse de cette FAQ <span class="text-danger">*</span></label>
    <textarea name="answer" id="description" required class="form-control" rows="10">
      {{ old("answer") ?? $faq->answer }}
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
