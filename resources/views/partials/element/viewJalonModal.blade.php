<div class="modal fade" id="vueJalonModal" tabindex="-1" role="dialog" aria-labelledby="vueJalonModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-primary h6 text-uppercase font-weight-bold modal-title" id="vueJalonModal">
                    Déscription d'un jalon de traitement
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Collaborateur</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded" id="collab"> </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Libellé</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded" id="lib"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <strong class="w-50">Date</strong>
                            <div class="text-left pl-2 w-50 bg-light rounded" id="date"></div>
                        </div>

                       <textarea class="form-control" readonly name="" id="descrip_traitement"  rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
