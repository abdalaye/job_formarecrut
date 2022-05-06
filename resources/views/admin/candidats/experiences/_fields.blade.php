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
    <div class="col-6">
        <div class="form-group">
            <x-field type="select" name="country_id" :options="['' => 'Pays'] + \App\Models\Country::active()->pluck('name', 'id')->all()" :validation="true" required>Pays</x-field>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <x-field type="select" name="city_id" :options="['' => 'Ville'] + \App\Models\City::active()->pluck('name', 'id')->all()" :validation="true" required>Ville</x-field>
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
