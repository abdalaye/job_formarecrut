<!-- Modal -->
<div class="modal fade text-left" id="showExperience{{ $experience->id }}" tabindex="-1" role="dialog" aria-labelledby="showExperience{{ $experience->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détail de l'expérience <span class="text-success">{{ $experience->poste }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="profile-work mt-2 w-100">
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Poste</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->poste }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Employeur</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->employeur }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Pays</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->country->name }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Ville</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->city->name }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Date de début</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->date_debut }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Date de fin</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->date_fin }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Description</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $experience->description }}</div>
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
