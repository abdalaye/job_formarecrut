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
                    @include("admin.offres.fiche")
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </form>
        </div>
    </div>
</div>
