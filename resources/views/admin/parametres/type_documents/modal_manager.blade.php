{{-- modal modification --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-primary h6 font-weight-bold modal-title">
                    <i class="fas fa-edit"></i> 
                    Modification ligne de chaine
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
                        <div class="form-group col-12 text-center">
                            <b class="text-muted">Rang</b>
                        </div>
                        <div class="form-group col-12">
                            <input type="hidden" name="chaine_validation_id" name="chaine_validation_id_modal" value="{{ $chaine->id }}">
                            <h4 class="h1 text-center font-weight-lighter text-muted" id="rangText">---</h4>
                        </div>
                        <div class="form-group col-12">
                            <label for="collaborateur_id">Sélectionner le collaborateur</label>
                            @include('partials.components.selectElement', [
                                'options' => $_collaborateurs,
                                "display" => "nom_complet",
                                "name" => "collaborateur_id",
                                "id" => "collaborateur_id_modal",
                                "required" => true
                            ])
                        </div>
                        <hr class="col-10 mx-auto">
                        <div class="form-group col-12 text-center">
                            <button class="btn btn-lg shadow btn-primary shadow-sm rounded">Mise à jour</button>
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