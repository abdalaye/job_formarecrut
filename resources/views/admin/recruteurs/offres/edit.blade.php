<!-- Modal -->
<div class="modal fade" id="editOffre{{ $offre->id }}" tabindex="-1" role="dialog" aria-labelledby="editOffre{{ $offre->id }}" aria-hidden="true">
    <div class="modal-dialog text-left" role="document">
        {!! Form::model($offre, ['method' => 'PUT', 'route' => ['admin.recruteurs.offres.update', ['entreprise' => $recruteur->id, 'offre' => $offre->id]], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'offre <span class="text-success">{{ $offre->titre }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    @include("admin.recruteurs.offres._fields", ["from_modal" => true])
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
