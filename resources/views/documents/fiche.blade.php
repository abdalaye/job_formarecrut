<div class="row">
    <div class="col-md-12">
        <label class="text-primary">Parcours du document</label>
        @php
            $last_validation = $document->validations->last();
        @endphp
        <div class="rounded" style="overflow-x: auto">
            @if (isset($document->validations) && count($document->validations))
                <ul class="step d-flex flex-nowrap rounded py-3 bg-light shadow-sm">
                    {{-- @if ($document->is_libre && $document->statut_document_id != 3) --}}
                        <li class="step-item">
                            <a href="#!">{{ $document->collaborateur->nom_complet ?? "Soumissionnaire" }}</a>
                        </li>
                    {{-- @endif --}}
                    @foreach ($document->validations as $validation)
                        @php
                            $doc_cloture = isset($last_validation) && $document->statut_document_id == 3 && $last_validation->statut_validation_id == 3 && $last_validation->id == $validation->id;
                        @endphp
                        <li class="step-item {{ $validation->statut_validation_id == 2 ? 'active' : '' }}">
                            <a href="#!"
                                @if ($validation->commentaire)
                                type="button"
                                data-toggle="modal"
                                data-target="#commentaireModal"
                                @endif
                                 class="text-dark{{ $validation->commentaire ? " showComment" : "" }}"
                                 data-auteur="{{ $validation->collaborateur->nom_complet ?? 'Non défini' }}"
                                 data-commentaire="{{ $validation->commentaire }}"
                                 >
                                {{ $validation->collaborateur->nom_complet ?? 'Non défini' }} <br>
                                <span class="badge badge-{{ $validation->statut_validation_id == 1 ? "light" : ($validation->statut_validation_id == 3 ? 'primary' : 'warning') }}">
                                    @if ($validation->statut_validation_id == 3)
                                        <i class="fas fa-check-circle mr-1"></i>
                                    @endif
                                    {{ $doc_cloture ? "Clôturé" : $validation->statut_validation->name ?? "Non défini" }}
                                </span>
                                @if ($validation->commentaire)
                                    <br>
                                    <i class="fas fa-comment-alt text-muted fa-2x"></i>
                                @endif
                            </a>
                        </li>
                    @endforeach
                    @if ($document->is_libre && $document->statut_document_id != 3)
                        <li class="step-item">
                            <a href="#!" class="small text-info">Suivant (à définir)</a>
                        </li>
                    @endif
                </ul>
            @else
                <div class="rounded border py-3 shadow-sm">
                    <div class="text-primary text-center font-weight-lighter">
                        <p><i class="fas fa-exclamation-triangle"></i></p>
                        <h4 class="h6">Parcours document non disponible</h4>
                        <p>
                            Le parcours de ce document n'est pas encore défini.
                        </p>
                    </div>
                </div>
            @endif
        </div>
        <hr>
    </div>

    <div class="col-md-6">
        <div class="form-group my-0">
            <label class="text-primary">Détails du document</label>
        </div>
        <hr class="mt-1 mb-3">
        <div class="profile-work mt-2 w-100">
            <div class="d-flex justify-content-between align-items-center pb-3">
                <strong class="w-50">Réference du document</strong>
                <div class="text-left pl-2 w-50 bg-light font-italic text-primary font-weight-bold rounded">
                    {{ $document->ref }}</div>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-3">
                <strong class="w-50">Nature du document</strong>
                <div class="text-left pl-2 w-50 bg-light rounded">{{ $document->name }}</div>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-3">
                <strong class="w-50">Type</strong>
                <div class="text-left pl-2 w-50 bg-light rounded">{!! $document->type_document->name !!}</div>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-3">
                <strong class="w-50">Etat</strong>
                <div class="text-left pl-2 w-50 bg-light rounded">{!! $document->statut_document->name !!}</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group my-0 d-flex justify-content-between align-items-center">
            <label class="text-primary">
                Pièces du document
            </label>
            <span class="badge badge-primary right">{{ count($document_pieces ?? []) }}</span>
        </div>
        <hr class="mt-1 mb-3">

        <div class="text-center" style="
            height: 160px;
            overflow-x: hidden;
            overflow-y: auto;
        ">
            @if (isset($document_pieces) && count($document_pieces))
                @foreach ($document_pieces as $piece)
                    {!! $piece->link_fancy !!}
                @endforeach
            @else
                <div class="jumbotron text-center">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                    <p>
                        Aucune pièce jointe avec le document
                    </p>
                </div>
            @endif
        </div>
    </div>
    @if (count($infos))
        <div class="col-md-12">
            <div class="pb-0">
                <label class="text-primary">Informations supplémentaires</label>
                <hr class="mt-1 mb-3">
            </div>
            <div class="row">
                @foreach ($infos as $info)
                    <div class="pb-3 {{ $info->field->col !== null ? 'col-md-' . $info->field->col : (in_array($info->field->type_field_id, [3, 4, 6, 8]) ? 'col-md-12' : 'col-md-6') }}">
                        <div>
                            <strong class="d-block w-100">{{ $info->field->label ?? $info->field->name }}</strong>
                        </div>
                        <div class="d-block text-left bg-light rounded">
                            @if($info->field->type_field_id == 2)
                                {{ number_format($info->value,0,',',' ') }}
                            @else
                                {!! $info->value_texte !!}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if ($document->description)
        <div class="col-md-12">
            <div class="form-group">
                <label class="text-primary">Description du document</label>
                <hr class="mt-1 mb-3">

                <div class="bg-light rounded p-2">
                    {!! $document->description !!}
                </div>
            </div>
        </div>
    @endif

    {{-- INCLURE LE MODAL des commentaires --}}
    @include("documents.commentaire_modal")
</div>
@section('scriptFiche')
    <script>
        $('body').on('click','.showComment', function (e) {
            let auteur = $(this).data('auteur');
            let contenu = $(this).data('commentaire');

            $('#auteur_commentaire').text(auteur);
            $('#contenu_commentaire').html(contenu);
        });
    </script>
@endsection
