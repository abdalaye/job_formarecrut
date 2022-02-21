@extends('layouts.admin')

@section('title', 'Visualisation type de document')

@section('actionItems')
    @if (!$typedocument->statut && isset($chaine))
        <a type="button" href="#"
            onclick="event.preventDefault();
            if(confirm('Vous êtes sur le point de publier ce type de document, il sera désormais disponible en dêpot ?')){
                document.getElementById('update{{ $typedocument->id }}').submit();
            }" class="dropdown-item">
            <i class="fas fa-check"></i> Publier
        </a>
        @include("partials.components.virtualFormElement",[
            'donnes' => ['statut' => 1],
            'ID' => "update$typedocument->id",
            'method' => 'PATCH',
            'url' => route('admin.typedocuments.publish', $typedocument)
        ])
    @endif
    <a href="{{ route('admin.typedocuments.edit', $typedocument->id) }}" class="dropdown-item">
        <i class="fa fa-edit"></i> Modifier</a>
    <a href="{{ url()->previous() }}" class="dropdown-item">
        <i class="fa fa-chevron-left"></i> Retour</a>
@endsection
@section('actions')
    @include("partials.components.dropdownElement")
@endsection

@section('content')
    <div class="col-md-12 pt-2">
        <div class="card rounded shadow-none border-0">
            <div class="card-body">
                <div class="form-group">
                    <label class="text-muted">Détails du Type de document</label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-work mt-2 w-100">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <strong class="w-50">Nature du document</strong>
                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $typedocument->name }}</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <strong class="w-50">Formats autorisés</strong>
                                <div class="text-left pl-2 w-50 bg-light rounded">{!! $typedocument->authorised_extensions_badge !!}</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <strong class="w-50">Etat</strong>
                                <div class="text-left pl-2 w-50 bg-light rounded">{!! $typedocument->statut_badge !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        @if (isset($typedocument->icon))
                            <img src="{{ asset($typedocument->icon) }}" alt="Icone document" class="img-rounded img-size-64">
                        @else
                            <i class="fas fa-file-alt fa-5x text-muted"></i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (isset($chaine))
        {{-- Contenu de la page --}}
        <div class="col-md-12 pt-2">
            <div class="card rounded shadow-none border-0">
                <div class="card-body">
                    {{-- <div class="container"> --}}
                    <div class="form-group">
                        <label class="text-muted">Le parcours du document</label>
                    </div>
                    @if (isset($chaine->is_libre) && $chaine->is_libre)
                        <div class="rounded border py-3 shadow-sm">
                            <div class="text-primary text-center font-weight-lighter">
                                <p><i class="fas fa-exclamation-triangle"></i></p>
                                <h4 class="h4">Chaine libre</h4>
                                <p>
                                    Il reviendra aux intervenants de se passer la main pour la validation du document.
                                </p>
                            </div>
                        </div>
                    @else
                        <ul class="step d-flex flex-nowrap rounded border py-3 shadow-sm">
                            @php $n =0; @endphp
                            @if ($chaine->include_managers)
                                @php $n = 3; @endphp
                                @for ($i = 1; $i < 4; $i++)
                                    <li class="step-item">
                                        <a href="#!">Manager - {{ $i }}</a>
                                    </li>
                                @endfor
                            @endif
                            @php $rang = $n + count($chaine_lignes) + 1; @endphp
                            @foreach ($chaine_lignes as $ligne)
                                <li class="step-item">
                                    <a href="#!" class="text-dark">{{ $ligne->collaborateur->nom_complet }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <hr>
                    <div class="form-group">
                        <label class="text-muted">Liste de diffusion</label>
                        <br>
                        <small class="text-muted">Les collaborateurs qui seront notifiés</small>
                    </div>

                    @if ($chaine->diffusionCollaborateurs)
                        @foreach ($chaine->diffusionCollaborateurs as $item)
                            <span class="badge badge-light p-2 mr-2 rounded shadow-sm">{{ $item->nom_complet }}</span>
                        @endforeach
                    @endif
                </div>
                {{-- </div> --}}
            </div>
        </div>
        <div class="col-md-12">
            <div class="card rounded shadow-none border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-muted">Formulaire du document</label>
                                <div class="form row mb-4 p-4 rounded bg-light border">
                                    <div class="form-group col-md-6">
                                        <label for="">Libellé document</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="" id="" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Les pieces à joindre</label>
                                        <table class="table table-borderless table-striped border">
                                            <thead>
                                                <th>Fichier</th>
                                                <th>Nom du fichier</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="file" name="" class="form-control form-control-sm" id="">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" class="form-control form-control-sm" id="">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- INCLUSION FORMULAIRE --}}
                                    @include('partials.components.formulaireFieldsElement')
                                    {{-- FIN INCLUSION FORMULAIRE --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-muted">Tableau des autorisations</label>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">Entité</th>
                                                <th class="text-primary">Autorisations Dêpot</th>
                                                <th class="text-primary">Autorisations Consultation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    Direction(s)
                                                </th>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->restriction_directions) !!}
                                                </td>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->consultation_directions) !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Département(s)</th>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->restriction_departements) !!}
                                                </td>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->consultation_departements) !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Service(s)</th>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->restriction_services) !!}
                                                </td>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->consultation_services) !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Collaborateur(s)</th>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->restriction_collaborateurs, 1) !!}
                                                </td>
                                                <td>
                                                    {!! $chaine->badgesByName($chaine->consultation_collaborateurs, 2) !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12">
            <div class="card rounded shadow-none border-0">
                <div class="card-body">
                    <div class="text-primary text-center font-weight-lighter">
                        <p><i class="fas fa-exclamation-triangle"></i></p>
                        <h4 class="h4">Chaine non configurée</h4>
                        <p>
                            Veuillez créer la chaine pour ce type de document avant de visualiser.
                        </p>
                        <a href="{{ route('admin.typedocuments.edit', $typedocument) }}" class="btn btn-warning">Aller à l'édition</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
