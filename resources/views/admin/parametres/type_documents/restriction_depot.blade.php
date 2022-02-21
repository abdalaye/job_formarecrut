<div class="row">
    <div class="col-12">
        <div class="card rounded shadow-none border-0">
            <div class="card-body row pb-0">
                <div class="col-1">
                   <span class="h1 text-primary">3</span>
                </div>
                <div class="col-11">
                    <h3 class="text-primary text-uppercase my-0 h6">autorisations sur le depôt</h3>
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
                                                <th class="text-primary">Autorisations</th>
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
                                                        "name" => "restriction_direction_ids[]",
                                                        "id" => "restriction_direction_ids",
                                                        "default" => explode(";", $chaine->restriction_direction_ids ?? ""),
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
                                                        "name" => "restriction_departement_ids[]",
                                                        "id" => "restriction_departement_ids",
                                                        "default" => explode(";", $chaine->restriction_departement_ids ?? ""),
                                                        "multiple" => true
                                                    ])
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Service(s)</th>
                                                <td>
                                                    @include('partials.components.selectElement', [
                                                        'options' => $_services,
                                                        "name" => "restriction_service_ids[]",
                                                        "id" => "restriction_service_ids",
                                                        "default" => explode(";", $chaine->restriction_service_ids ?? ""),
                                                        "display" => "name",
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
                                                        "empty" => $chaine->restriction_tous_collaborateurs ? "Tous les collaborateurs" : false,
                                                        "name" => "restriction_collaborateur_ids[]",
                                                        "id" => "restriction_collaborateur_ids",
                                                        "default" => explode(";", $chaine->restriction_collaborateur_ids ?? ""),
                                                        "multiple" => true
                                                    ])
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group text-right">
                                        <input type="hidden" name="restriction_section" value="1">
                                        <button class="btn btn-warning"><i class="fas fa-edit"></i> Mettre à jour</button>
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