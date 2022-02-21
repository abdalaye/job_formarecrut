@extends('layouts.admin')
@section('title')
    Recherche
@endsection

@section('content')
    {{-- Contenu de la page --}}
    <div class="col-md-12">
        <div class="card-body bg-white mb-2 rounded">
            <h6 class="text-muted font-weight-lighter">Terme(s) recherché(s) : <span class="badge badge-primary">{{ request()->query('search') }}</span>  @if (isset($documents)) <span class="badge badge-light"> {{ count($documents) }} {{ Str::plural("Résultat", count($documents)) }}  {{ Str::plural("Trouvé", count($documents)) }}</span> @endif</h6> 
        </div>
        <div class="card-body rounded px-0">
            @if (isset($documents) && count($documents))
                <div class="list-group">
                    @foreach ($documents as $document)
                        <li class="list-group-item py-1 px-3 rounded mb-2 bg-white border-0 shadow-sm d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('documents.consultations.show', $document->ref) }}">
                                    {{ $document->name }} <br>
                                    <small class="text-muted"><i class="fas fa-file"></i> {{ $document->type_document->name }} | <i class="fas fa-user"></i> {{ $document->collaborateur->nom_complet }}</small> | <span class="badge badge-secondary">{{ $document->statut_document->name }}</span>
                                </a>
                            </div>
                            <a href="{{ route('documents.consultations.show', $document->ref) }}" class="btn btn-primary"><i class="fas fa-arrow-circle-right text-white"></i></a>
                        </li>   
                    @endforeach
                </div>
            @else
                <div class="text-danger text-center p-5 alert-light">Aucun résultat ne correspond à votre recherche</div>
            @endif
        </div>
    </div>
@endsection
