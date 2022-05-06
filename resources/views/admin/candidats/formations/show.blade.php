<!-- Modal -->
<div class="modal fade text-left" id="showFormation{{ $formation->id }}" tabindex="-1" role="dialog" aria-labelledby="showFormation{{ $formation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détail de la formation <span class="text-success">{{ $formation->formation }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="profile-work mt-2 w-100">
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Formation</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->titre }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Etablissement</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->etablissement }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Pays</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->country->name }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Ville</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->city->name }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Date de début</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->date_debut }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Date de fin</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->date_fin }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Description</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $formation->description }}</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </form>
        </div>
    </div>
</div>
