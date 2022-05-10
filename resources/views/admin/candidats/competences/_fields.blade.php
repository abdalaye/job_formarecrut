<div class="row">


    <div class="col-12">
        <x-field name="name" required placeholder="Compétence">Compétence</x-field>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <x-select-field name="niveau_competence_id" :options="['' => 'Niveau de compétence'] + keyedSelect(\App\Models\NiveauCompetence::class)" :validation="true" required>
            Niveau
        </x-select-field>
    </div>
</div>
