<div class="row">
    <div class="col-12">
        <x-field name="titre" :validation="true" required>Titre</x-field>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-field type="textarea" id="{{ isset($edit) && $edit ? 'description_edit' : 'description' }}" name="description" :validation="true" required>Description</x-field>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <x-field name="address" :validation="true" required>Adresse</x-field>
    </div>
</div>

@if (isset($includeEntreprises) && $includeEntreprises)
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-select-field
                name="entreprise_id"
                id="entreprise_id"
                :options="keyedSelect(\App\Models\Entreprise::active(), 'nom')"
                :validation="true"
                required
                class="form-control custom-select select2"
            >
                Entreprise liée
            </x-select-field>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-select-field
                name="secteur_id"
                id="secteur_id"
                :options="keyedSelect(\App\Models\Secteur::active())"
                :validation="true"
                required
                class="form-control custom-select select2"
            >
                Secteurs d'activité
            </x-field>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-field name="expires_at" type="date" :validation="true" required>Date d'expiration</x-field>
        </div>
    </div>
</div>

@push("scripts")
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <script>
        if($("textarea").length > 0) {
            //textarea sur les champs long text
            $.each($("textarea"), function(i, item) {
                var id = $(item).attr('id');
                CKEDITOR.replace(id);
            });
        }
    </script>
@endpush
