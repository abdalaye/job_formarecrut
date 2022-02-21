<!-- Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-primary h6 text-uppercase font-weight-bold modal-title">
                    <i class="fas fa-plus-circle"></i> 
                    Nouveau type chaine
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.typechaines.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Libellé du type de chaine de validation</label>
                            <input type="text" placeholder="ex: facture, contrat, ..." name="name" id="name" required class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label for="authorised_extensions">Formats autorisés</label>
                            @if (isset($extensions) && count($extensions))
                                <div class="d-block">
                                    @foreach ($extensions as $name => $values)
                                        <label for="{{ $name }}" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="checkbox" name="authorised_extensions[]" value="{{ $values }}" id="{{ $name }}">
                                            {{ strtoupper($name) }}
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-12">
                            <label for="icon">Icône lié</label>
                            <input type="file" name="icon" id="icon" class="form-control form-control-file">
                        </div>
                        <hr class="col-10 mx-auto">
                        <div class="form-group col-12 text-center">
                            <button class="btn btn-primary shadow-sm rounded">Enregistrer</button>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                </div> --}}
            </form>
        </div>
    </div>
</div>

{{-- modal modification --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-primary h6 text-uppercase font-weight-bold modal-title">
                    <i class="fas fa-edit"></i> 
                    Modification type chaine
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" id="editForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="edit_name">Nature du chaine</label>
                            <input type="text" placeholder="ex: facture, contrat, ..." name="name" id="edit_name" required class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label for="edit_authorised_extensions">Formats autorisés</label>
                            @if (isset($extensions) && count($extensions))
                                <div class="d-block">
                                    @foreach ($extensions as $name => $values)
                                        <label for="{{ $name }}" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="checkbox" name="authorised_extensions[]" value="{{ $values }}" id="{{ $name }}">
                                            {{ strtoupper($name) }}
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-12">
                            <label for="edit_icon">Icône lié</label>
                            <input type="file" name="icon" id="edit_icon" class="form-control form-control-file">
                        </div>
                        <hr class="col-10 mx-auto">
                        <div class="form-group col-12">
                            <button class="btn btn-primary btn-block shadow-sm rounded">Mise à jour</button>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                </div> --}}
            </form>
        </div>
    </div>
</div>