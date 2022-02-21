<div class="row">
    <div class="col-12">
        <div class="card rounded shadow-none border-0">
            <div class="card-body row pb-0">
                <div class="col-1">
                    <span class="h1 text-primary">1</span>
                </div>
                <div class="col-11">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-primary text-uppercase my-0 h6">Démarrage type document</h3>
                        {!! $typedocument->statut_badge !!}
                    </div>
                    <hr>
                </div>
                @include('admin.parametres.type_documents.edition_base')
                @if (!isset($creation))
                    @include('admin.parametres.type_documents.champs_dynamique')
                @endif
    
            </div>
        </div>
    </div>
</div>