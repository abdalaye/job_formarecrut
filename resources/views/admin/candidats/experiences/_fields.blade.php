<div class="row">
    <div class="col-12">
        <x-field name="poste" :validation="true" required>Poste</x-field>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-field name="employeur" :validation="true" required>Employeur</x-field>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="form-group">
            @php 
            $selectedOptions = $experience->secteurs()->pluck('id')->all();
            @endphp
            <x-select-field name="secteur_ids[]" id="secteur_ids" :options="keyedSelect(\App\Models\Secteur::active())" :selected="$selectedOptions" :validation="true" required multiple>Secteurs d'activité</x-field>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            <x-select-field name="country_id" :options="keyedSelect(\App\Models\Country::active())" :validation="true" required>Pays</x-field>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <x-select-field name="city_id" :options="keyedSelect(\App\Models\City::active())" :validation="true" required>Ville</x-field>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            <x-field name="date_debut" :validation="true" type="date" required>Date de début</x-field>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <x-field name="date_fin" :validation="true" type="date" required>Date de fin</x-field>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <x-field name="description" :validation="true" type="textarea" required>Description</x-field>
        </div>
    </div>
</div>
