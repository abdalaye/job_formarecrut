{{-- modal modification --}}

<div class="modal fade" id="fieldAddModal" tabindex="-1" role="dialog" aria-labelledby="fieldAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-primary h6 font-weight-bold modal-title">
                    <i class="fas fa-plus-circle"></i>
                    Création d'un champ additionnel
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.fields.store') }}" id="editForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Intitulé <span class="text-danger">*</span></label>
                        <input type="text" name="name" required class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="type">Type de champ <span class="text-danger">*</span></label>
                        @include('partials.components.selectElement', [
                                'options' => $_type_fields,
                                'empty' => "Sélectionner le type",
                                'required' => true,
                                'class' => "form-control",
                                "name" => "type_field_id",
                                'display' => 'name',
                            ])
                    </div>
                    {{-- <div class="form-group">
                        <label for="niveau">Référence</label>
                        <input type="text" name="ref" class="form-control form-control-sm"  placeholder="référence">
                    </div> --}}
                    <div class="form-group d-none">
                        <label for="niveau">Type de grille</label>
                        <select name="dynamic" id="dynamic" disabled class="form-control">
                            <option value="1" selected>Grille dynamique</option>
                            <option value="0">Grille statique</option>
                        </select>
                    </div>
                    <div class="form-group d-none">
                        <label for="choices">Valeurs <small>(séparer les valeurs par point virgule : ";")</small></label>
                        <input type="text" id="choices" disabled name="choices" required class="form-control form-control-sm">
                    </div>
                    <div class="form-group d-none">
                        <label for="lignes">Lignes de la grille statique <small>(séparer les valeurs par point virgule : ";")</small></label>
                        <input type="text" name="lignes" id="lignes" placeholder="Lignes du tableau" required class="form-control form-control-sm" disabled>
                    </div>
                    <div class="form-group">
                        <label for="col">Largeur <span class="text-danger">*</span></label>
                        <select name="col" id="col" class="form-control">
                            <option value selected>Séléctionner le nombre de colonnes</option>
                            <option value="1">1/8</option>
                            <option value="2">2/12</option>
                            <option value="3">3/12</option>
                            <option value="4">4/12</option>
                            <option value="6">6/12</option>
                            <option value="12">12/12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="label">Label à afficher</label>
                        <input type="text" name="label" id="label" placeholder="Saisissez le texte à afficher" class="form-control form-control-sm">
                        {{-- <select name="label" id="label" class="form-control">
                            <option value="1" selected>Oui</option>
                            <option value="0">Non</option>
                        </select> --}}
                    </div>
                    <div class="form-group">
                        <label for="choices">Ce champ est-il obligatoire ? <span class="text-danger">*</span></label>
                        <select name="requis" id="requis" class="form-control">
                            <option value="1">Obligatoire</option>
                            <option value="0">Non Obligatoire</option>
                        </select>
                    </div>
                </div>


                <div class="modal-footer">
                    <input type="hidden" name="type_document_id" value="{{ $typedocument->id }}">
                    <input type="hidden" name="rang" value="{{ count($fields ?? []) + 1 }}">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
