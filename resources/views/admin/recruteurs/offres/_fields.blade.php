<div class="row">
    <div class="col-12">
        <x-field name="titre" :validation="true" required>Titre</x-field>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-field type="textarea" name="description" :validation="true" required>Description</x-field>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-select-field 
                name="secteur_id" 
                id="secteur_id" 
                :options="keyedSelect(\App\Models\Secteur::active())" 
                :validation="true" 
                required 
                class="form-control custom-select"
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
