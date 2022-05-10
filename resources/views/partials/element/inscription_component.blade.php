<div class="col-md-12">
    <div class="card border-0">
        <div class="card-body border-0">
            <h1 class="h4 font-weight-bolder text-primary mb-2 border-bottom text-uppercase">Inscription</h1>
            @if (session("error"))
                <div class="alert alert-danger">
                    <h4>Echec de l'opération</h4>
                    <p>
                        {!! session('error') !!}
                    </p>
                </div>

            @endif
            <ul class="nav nav-pills mb-3 nav nav-pills mb-3 bg-light p-2" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                        role="tab" aria-controls="pills-home" aria-selected="true">Je suis candidat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                        role="tab" aria-controls="pills-profile" aria-selected="false">Je suis recruteur</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">

                    @include('partials.element.form_candidat')

                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                    aria-labelledby="pills-profile-tab">

                    @include('partials.element.form_recruteur')
                </div>
            </div>
        </div>
    </div>
</div>
