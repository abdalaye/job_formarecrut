<!-- Modal -->
<div class="modal fade text-left" id="showOffre{{ $offre->id }}" tabindex="-1" role="dialog" aria-labelledby="showOffre{{ $offre->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détail de l'offre <span class="text-success">{{ $offre->titre }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="profile-work mt-2 w-100">
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Titre</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->titre }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Description</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->description }}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Secteur d'activité</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->secteur->name ?? '---' }}</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Date d'expiration</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded">{{ to_french_date($offre->expires_at) }}</div>
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
