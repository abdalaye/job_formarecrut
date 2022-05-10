<!-- Modal -->
<div class="modal fade text-left" id="editCompetence{{ $competence->id }}" tabindex="-1" role="dialog" aria-labelledby="editCompetence{{ $competence->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::model($competence, ['method' => 'put', 'route' => ['admin.candidats.competences.update', ['candidat' => $candidat->id, 'competence' => $competence->id]], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Modifier la compétence <span class="text-success">{{ $competence->name }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    @include("admin.candidats.competences._fields", ["from_modal" => true])
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
        {!! Form::close() !!}
    </div>
</div>

