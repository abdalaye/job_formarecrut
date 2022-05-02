<!-- Modal -->
<div class="modal fade" id="addFormation" tabindex="-1" role="dialog" aria-labelledby="addFormation" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {!! Form::model(new \App\Models\Training, ['method' => 'POST', 'route' => ['admin.candidats.formations.store', $candidat], 'class' => 'modal-content']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle formation</h5>
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
