<div class="row">
    <div class="col-12">
        <div class="card rounded shadow-none border-0">
            <div class="card-body row pb-0">
                <div class="col-1">
                    <span class="h1 text-primary">2</span>
                </div>
                <div class="col-11">
                    <h3 class="text-primary text-uppercase my-0 h6">Parcours du document</h3>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="card rounded mb-0 shadow-none border-0">
                        <div class="card-body pb-0">
                            <form method="POST" action="{{ isset($chaine) ? route('admin.chainevalidations.update', $chaine->id) : route('admin.chainevalidations.store') }}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($chaine))
                                    @method("PATCH")
                                @endif
                                <div class="form-group">
                                    <label class="text-primary" title="Le type de chaine prédéfni peut avoir plusieurs lignes de chaine.Le type libre, seul la première est requise.">Définition de la chaine -  <i class="text-muted fas fa-question-circle"></i></label>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="name" value="{{ $chaine->name ?? "chaine - $typedocument->name" }}">
                                    <input type="hidden" name="type_document_id" value="{{ $typedocument->id }}">
                                    <label>Type de chaine</label>
                                    <div class="d-block">
                                        <label for="libre2" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="radio" id="libre2" name="is_libre" {{ !isset($chaine->is_libre) || !$chaine->is_libre ? "checked" : "" }} value="0"> Chaine Pré-définie
                                        </label>
                                        <label for="libre1" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="radio" id="libre1" name="is_libre" {{ isset($chaine->is_libre) && $chaine->is_libre ? "checked" : "" }} value="1"> Chaine Libre
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group is_libre {{ isset($chaine->is_libre) && $chaine->is_libre ? "d-none" : "" }} ">
                                    <input type="hidden" name="name" value="{{ $chaine->name ?? "chaine - $typedocument->name" }}">
                                    <input type="hidden" name="type_document_id" value="{{ $typedocument->id }}">
                                    <label>Inclure les managers (n1 - n3)</label>
                                    <div class="d-block">
                                        <label for="notIncluded" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="radio" id="notIncluded" name="include_managers" {{ !isset($chaine->include_managers) || !$chaine->include_managers ? "checked" : "" }} value="0"> Ne pas inclure
                                        </label>
                                        <label for="included" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="radio" id="included" name="include_managers" {{ isset($chaine->include_managers) && $chaine->include_managers ? "checked" : "" }} value="1"> Inclure
                                        </label>
                                    </div>
                                </div>
                                @if (isset($chaine))
                                <hr>
                                <div class="form-group">
                                    <label class="text-primary" title="La liste des collaborateurs qui seront notifié lors du traitement du document.">Liste de diffusion -  <i class="text-muted fas fa-question-circle"></i></label>
                                </div>
                                <div class="form-group">
                                    <label>Notifier les managers (n1 - n3)</label>
                                    <div class="d-block">
                                        <label for="notIncludedNotiFy" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="radio" id="notIncludedNotiFy" name="notify_managers" {{ !isset($chaine->notify_managers) || !$chaine->notify_managers ? "checked" : "" }} value="0"> Ne pas notifier
                                        </label>
                                        <label for="includedNotiFy" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="radio" id="includedNotiFy" name="notify_managers" {{ isset($chaine->notify_managers) && $chaine->notify_managers ? "checked" : "" }} value="1"> Notifier
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sélectionner les collaboteurs de la liste de diffusion</label>
                                    @include('partials.components.selectElement', [
                                        'options' => $_collaborateurs,
                                        "display" => "nom_complet",
                                        "name" => "notify_all[]",
                                        "id" => "notify_all",
                                        "multiple" => true,
                                        "default" => explode(';', $chaine->notify_all ?? ""),
                                    ])
                                </div>
                                <div class="form-group text-right">
                                    <input type="hidden" name="is_list_diffusion" value="1">
                                    <button type="submit" class="btn btn-lg btn-warning"><i class="fas fa-edit"></i> Mettre à jour</button>
                                </div>
                                @else
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-plus-circle"></i> Créer la chaine
                                    </button>
                                </div>
                                @endif
                            </form>
                            @if(isset($chaine))
                            <div class="is_libre {{ isset($chaine->is_libre) && $chaine->is_libre ? "d-none" : "" }} ">
                                <hr>
                                <div class="form-group">
                                    <label title="Le type de chaine prédéfni peut avoir plusieurs lignes de chaine.Le type libre, seul la première est requise." class="text-primary">Définition lignes -  <i class="text-muted fas fa-question-circle"></i></label>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Rang</th>
                                            <th>Collaborateur</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $n =0; @endphp
                                        @if ($chaine->include_managers)
                                            @php $n = 3; @endphp
                                            @for ($i = 1; $i < 4; $i++)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>Manager - {{ $i }}</td>
                                                    <td>---</td>
                                                </tr>
                                            @endfor
                                        @endif
                                        @php $rang = $n + count($chaine_lignes) + 1; @endphp
                                        @foreach ($chaine_lignes as $ligne)
                                            <tr>
                                                <td>{{ $ligne->rang + $n }}</td>
                                                <td>{{ $ligne->collaborateur->nom_complet }}</td>
                                                <td>
                                                    <a href="#"
                                                        type="button"
                                                        data-toggle="modal"
                                                        data-target="#editModal"
                                                        data-collaborateur_id="{{ $ligne->collaborateur_id }}"
                                                        data-rang="{{ $ligne->rang + $n }}"
                                                        data-url="{{ route('admin.lignechaines.update', $ligne) }}"
                                                        class="btn btn-xs btn-light text-warning editModal"
                                                        ><i class="fas fa-edit"></i></a>
                
                                                    @include('partials.components.deleteBtnElement', [
                                                        "btnInnerHTML" => '<i class="fas fa-trash"></i>',
                                                        "class" => 'btn btn-xs btn-light text-primary',
                                                        'entity' => $ligne,
                                                        'url' => route('admin.lignechaines.destroy', $ligne)
                                                    ])
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <form action="{{ route('admin.lignechaines.store') }}" method="POST" class="form-group">
                                    @csrf
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="shadow-sm border-top">
                                                <td>
                                                    <input type="hidden" name="rang" value="{{ count($chaine_lignes) + 1 }}">
                                                    <input type="hidden" name="chaine_validation_id" value="{{ $chaine->id }}">
                                                    {{ $rang }}
                                                </td>
                                                <td>
                                                    @include('partials.components.selectElement', [
                                                        'options' => $_collaborateurs,
                                                        "display" => "nom_complet",
                                                        "name" => "collaborateur_id",
                                                        "required" => true
                                                    ])
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>