<div class="form row mb-4 mx-0 p-3 rounded bg-light border animate__animated animate__slideInUp">
    <div class="form-group col-md-12">
        <label for="">Libellé <span class="text-danger">*</span></label>
        <input type="text" required name="name" value="{{ $document->name }}" class="form-control">
        <input type="hidden" name="type_document_id" value="{{ $document->type_document_id }}" />
        <input type="hidden" name="chaine_validation_id" value="{{ $document->chaine_validation_id }}" />
        <input type="hidden" name="collaborateur_id" value="{{ $document->collaborateur_id }}" />
        <input type="hidden" name="statut_document_id" value="{{ $document->statut_document_id }}" />
    </div>

    {{-- INCLUSION FORMULAIRE --}}
    @include('partials.components.formulaireFieldsElement')
    {{-- FIN INCLUSION FORMULAIRE --}}

    <div class="form-group col-md-12">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="5">
            {{ $document->description }}
        </textarea>
    </div>

    <div class="form-group col-md-12">
        <label>Les pieces à joindre (<small class="small text-muted">Formats acceptés: </small> <small class="small text-primary text-uppercase">{{ implode(", ",$typedocument->authorised_extensions_array) }}</small>)</label>
        <table class="table table-borderless table-striped border">
            <thead>
                <th>Fichier</th>
                <th>Nom du fichier</th>
                <th>
                    <button class="btn btn-sm btn-primary" type="button" id="add_piece"><i class="fas fa-plus-circle"></i></button>
                </th>
            </thead>
            <tbody id="tableauPieces">
                @if (isset($document_pieces) && count($document_pieces))
                    <form action="" class="d-none"></form>
                    @foreach ($document_pieces as $piece)
                        <tr>
                            <td>
                                {!! $piece->link_fancy !!}
                            </td>
                            <td>
                                {{ $piece->name }}
                            </td>
                            <td>
                                @include("partials.components.deleteBtnElement", [
                                    'url' => route('document_pieces.destroy', $piece->id),
                                    'class' => ' ',
                                    'entity' => $piece,
                                    'btnInnerHTML' =>  '<button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>'
                                ])
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if (!(isset($document_pieces) && count($document_pieces)))
                    <tr id="ligne0">
                        <td>
                            <input type="file" required name="pieces[0][file]" data-rang="0" id="piece_file0" accept="{{ $typedocument->accept_extensions }}" name="" class="form-control form-control-sm" id="">
                        </td>
                        <td>
                            <input maxlength="255" type="text" required name="pieces[0][name]" data-rang="0" id="piece_name0" class="form-control form-control-sm" id="">
                        </td>
                        <td>
                            (requis)
                            {{-- <button class="btn btn-sm btn-danger removePiece" data-rang="0"><i class="fas fa-trash"></i></button> --}}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="form-group col-md-12 text-right">
        <hr>
        <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
        <button type="submit" name="soumettre" value="1" class="btn btn-lg btn-success"><i class="fas fa-check-double mr-2"></i> Enregistrer & soumettre</button>
    </div>
</div>
