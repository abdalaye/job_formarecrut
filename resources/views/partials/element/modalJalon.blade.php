<div class="modal fade" id="jalonModal" tabindex="-1" role="dialog" aria-labelledby="jalonModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h3 class="text-primary h6 text-uppercase font-weight-bold modal-title" id="jalonModal">
                    <i class="fas fa-plus-circle"></i>
                    Ajout d'un jalon de traitement
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('receptions.jalons.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="action" class="col-form-label text-md-right">{{ __("libellé *") }}</label>
                            <input type="text" class="form-control @error('action') is-invalid @enderror" name="jalon[action]" required autocomplete="action" autofocus>

                            @error('jalon.action')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-form-label text-md-right">{{ __("Date  *") }}</label>
                            <input  type="date" class="form-control @error('date_creation') is-invalid @enderror" name="jalon[date_creation]" value="{{ now()->format('Y-m-d') }}" required autocomplete="date_creation" autofocus>
                            <input type="hidden" id="id" name="id" value="">

                            @error('jalon.date_creation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-form-label text-md-right">{{ __("Description *") }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="jalon[description]" required rows="3"></textarea>
                            @error('jalon.description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="jalon[validation_id]" value="{{$validation->id}}">
                        <input type="hidden" name="jalon[document_id]" value="{{$validation->document_id}}">
                        <input type="hidden" name="jalon[collaborateur_id]" value="{{$collaborateur_id}}">
                    </div>
                    <div class="form-group ">
                        <label>Les pieces à joindre (<small class="small text-muted">Format acceptés: </small> <small class="small text-primary text-uppercase">{{ implode(", ",$typedocument->authorised_extensions_array) }}</small>)</label>
                        <table class="table table-borderless table-striped border">
                            <thead>
                                <th>Fichier</th>
                                <th>Nom du fichier</th>
                                <th>
                                    <button class="btn btn-sm btn-primary float-right" type="button" id="add_piece"><i class="fas fa-plus-circle"></i></button>
                                </th>
                            </thead>
                            <tbody id="tableauPieces">

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
