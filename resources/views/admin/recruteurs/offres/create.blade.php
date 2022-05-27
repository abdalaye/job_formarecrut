<!-- Modal -->
<div class="modal fade" id="addOffre" tabindex="-1" role="dialog" aria-labelledby="addOffre" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::model($offre, ['method' => 'POST', 'route' => ['admin.recruteurs.offres.store', ['entreprise' => $recruteur->id]], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle offre professionnelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    @include("admin.recruteurs.offres._fields", ['from_modal' => true])
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
        {!! Form::close() !!}
    </div>
</div>
