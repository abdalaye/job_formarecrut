{!! Form::model($recruteur, ['method' => 'put', 'route' => ['admin.recruteurs.step2', $recruteur], 'files' => true, 'novalidate' => true]) !!}
<div class="row">
    <div class="col-md-4">
        <x-select-field 
                name="gender" 
                id="gender" 
                :options="['' => '---', 'mr' => 'Monsieur', 'mrs' => 'Madame']" 
                :validation="true" 
                required 
            >
            Civilité
        </x-select-field>
    </div>

    <div class="col-md-4">
        <x-field name="prenom" :validation="true" required>Prénom</x-field>
    </div>
    
    <div class="col-md-4">
        <x-field name="nomfamille" :validation="true" required>Nom de famille</x-field>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <x-field type="email" name="email" :validation="true" required>Adresse email</x-field>
        </div>
    </div>

    <div class="col-md-4">
        <x-field type="password" name="password" :validation="true" required>Mot de passe</x-field>
    </div>

    <div class="col-md-4">
        <x-field type="password" name="password_confirmation" :validation="true" required>Confirmer le mot de passe</x-field>
    </div>
</div>


{!! Form::hidden('step', $step) !!}

<div class="row">
    <div class="col-md-12">
        <div class="text-right rounded px-2 py-3 border col-12">
            <button type="submit" name="action" value="save" class="btn btn-outline-primary mx-2">Enregistrer</button>
            <button type="submit" name="action" value="next" class="btn btn-outline-secondary ml-2">Suivant <i
                    class="fas fa-arrow-circle-right ml-2"></i></button>
        </div>
    </div>
</div>




{!! Form::close() !!}