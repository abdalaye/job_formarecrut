<!-- Modal -->
<div class="modal fade text-left" id="editExperience{{ $experience->id }}" tabindex="-1" role="dialog" aria-labelledby="editExperience{{ $experience->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::model($experience, ['method' => 'PUT', 'route' => ['admin.candidats.experiences.update', ['candidat' => $candidat->id, 'experience' => $experience->id]], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'expérience <span class="text-success">{{ $experience->poste }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    @include("admin.candidats.experiences._fields", ["from_modal" => true])
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
