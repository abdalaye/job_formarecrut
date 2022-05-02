<!-- Modal -->
<div class="modal fade text-left" id="editFormation{{ $formation->id }}" tabindex="-1" role="dialog" aria-labelledby="editFormation{{ $formation->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::model($formation, ['method' => 'PUT', 'route' => ['admin.candidats.formations.update', ['candidat' => $candidat->id, 'formation' => $formation->id]], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Modifier la formation <span class="text-success">{{ $formation->formation }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    @include("admin.candidats.formations._fields", ["from_modal" => true])
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
        {!! Form::close() !!}
    </div>
</div>
