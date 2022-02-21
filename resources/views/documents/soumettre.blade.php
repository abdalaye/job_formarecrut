@extends('layouts.admin')
@section('title', "Soumission document")

@section('content')
    <div class="col-md-12 pt-2">
        <div class="card rounded shadow-none border-0">
            <div class="card-body">
                <div class="form-group">
                    <label for="type_docuement_id">Type document</label>
                    <div class="d-block"><span class="badge badge-secondary">{{ $document->type_document->name ?? "Non défini" }}</span></div>
                </div>
                <div class="form-group">
                    <label for="type_docuement_id">Reférence du document</label>
                    <div class="d-block">
                        <span class="badge badge-secondary">{{ $document->ref ?? "Non défini" }}</span>
                    </div>
                </div>
                @if (isset($document))
                    <form method="POST" action="{{ route("documents.soumettre", $document->ref) }}" class="form-group">
                        @csrf
                        @method("PATCH")

                        <div class="alert alert-default-warning text-center">
                            <div class="tex-center p-4">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>
                                <hr>
                                <p class="h5">
                                    Veuillez transmettre le document à un collaborateur.
                                </p>
                            </div>
                        </div>

                        <div class="form row mb-4 mx-0 p-3 rounded bg-light border animate__animated animate__slideInUp">
                            <div class="form-group col-md-12">
                                <label for="">Transmettre le document à : <span class="text-danger">*</span></label>
                                @include('partials.components.selectElement', [
                                    'options' => $_collaborateurs,
                                    "display" => "nom_complet",
                                    "empty" => "Sélectionner un collaborateur",
                                    "name" => "collaborateur_id",
                                    "required" => true,
                                ])
                            </div>
                        
                            <div class="form-group col-md-12 text-right">
                                <hr>
                                <button type="submit" name="soumettre" value="1" class="btn btn-lg btn-success"><i class="fas fa-check-double mr-2"></i> Soumettre</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="form-group">
                        <div class="alert alert-light text-primary text-center">
                            <i class="fas fa-info-circle fa-3x"></i>
                            <p>
                                Pour commencer la création vous devez choisir le type de document à saisir.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
