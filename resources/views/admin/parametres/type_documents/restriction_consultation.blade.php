<div class="row">
    <div class="col-12">
        <div class="card rounded shadow-none border-0">
            <div class="card-body row pb-0">
                <div class="col-1">
                    <span class="h1 text-primary">4</span>
                </div>
                <div class="col-11">
                    <h3 class="text-primary text-uppercase my-0 h6">autorisations sur la consultation</h3>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="card mb-0 rounded shadow-none border-0">
                        <div class="card-body pb-0">
                            @if (isset($chaine))
                                <form method="POST" action="{{ route('admin.chainevalidations.update', $chaine->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method("PATCH")
                                    {{-- <div class="form-group">
                                        <label for="name">Définissez les autorisations</label>
                                    </div> --}}
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">Entité</th>
                                                <th class="text-primary">Autorisation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    Direction(s)
                                                </th>
                                                <td>
                                                    @include('partials.components.selectElement', [
                                                        'options' => $_directions,
                                                        "display" => "name",
                                                        "name" => "consultation_direction_ids[]",
                                                        "id" => "consultation_direction_ids",
                                                        "default" => explode(";", $chaine->consultation_direction_ids ?? ""),
                                                        "multiple" => true
                                                    ])
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Département(s)</th>
                                                <td>
                                                    @include('partials.components.selectElement', [
                                                        'options' => $_departements,
                                                        "display" => "name",
                                                        "name" => "consultation_departement_ids[]",
                                                        "id" => "consultation_departement_ids",
                                                        "default" => explode(";", $chaine->consultation_departement_ids ?? ""),
                                                        "multiple" => true
                                                    ])
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Service(s)</th>
                                                <td>
                                                    @include('partials.components.selectElement', [
                                                        'options' => $_services,
                                                        "name" => "consultation_service_ids[]",
                                                        "id" => "consultation_service_ids",
                                                        "display" => "name",
                                                        "default" => explode(";", $chaine->consultation_service_ids ?? ""),
                                                        "multiple" => true
                                                    ])
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Collaborateur(s)</th>
                                                <td>
                                                    @include('partials.components.selectElement', [
                                                        'options' => $_collaborateurs,
                                                        "display" => "nom_complet",
                                                        "empty" => $chaine->consultation_tous_collaborateurs ? "Tous les collaborateurs" : false ,
                                                        "name" => "consultation_collaborateur_ids[]",
                                                        "id" => "consultation_collaborateur_ids",
                                                        "default" => explode(";", $chaine->consultation_collaborateur_ids ?? ""),
                                                        "multiple" => true
                                                    ])
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group text-right">
                                        <input type="hidden" name="consultation_section" value="1">
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Mettre à jour</button>
                                    </div>
                                </form>
                            @else
                                <div class="jumbotron bg-white text-center">
                                    <i class="fas fa-exclamation-triangle fa-3x"></i>
                                    <p>
                                        Commencez par créer une chaine
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>