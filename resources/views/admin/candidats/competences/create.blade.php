<!-- Modal -->
<div class="modal fade" id="addCompetence" tabindex="-1" role="dialog" aria-labelledby="addCompetence" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::model($competence, ['method' => 'post', 'route' => ['admin.candidats.competences.store', $candidat], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle compétence</h5>
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
                <button type="submit" name="add_again" value="1" class="btn btn-secondary">Enregistrer et ajouter une autre</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
        {!! Form::close() !!}
    </div>
</div>


@if(request()->query->has('add_again'))
@push('scripts')
<script>
    $('#addCompetence').modal('show');
</script>
@endpush
@endif 

