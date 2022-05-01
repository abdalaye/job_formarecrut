<div class="cv-preview">
    <div class="cv-preview__header d-flex align-items-center">
        {{ $recruteur->logoImg() }}
        <div>
            <h1>{{ $recruteur->nom }}</h1>
            <ul>
                <li><i class="fa fa-phone"></i> {{ $recruteur->phone }}</li>
                <li><i class="fa fa-map-marker"></i> {{ $recruteur->adresse }}</li>
            </ul>
        </div>
    </div>

    <div class="cv-preview-content col-6">
        <div class="cv-preview-item">
            <h2 class="cv-preview-item__heading">Profil</h2>
            <p>{{ $recruteur->description }}</p>
        </div>

        @foreach($recruteur->pro_experiences()->get() as $experience)
        <div class="cv-preview-item">
            <h2 class="cv-preview-item__heading">{{ $experience->poste }}</h2>
            <div class="d-flex align-items-center justify-content-between">
                <div><strong>{{ $experience->employeur }} - {{ $experience->ville }}</strong></div>
                <div>
                    {{ $experience->debut_mois }} - {{ $experience->debut_annee }} &nbsp;&nbsp;
                    {{ $experience->fin_mois }} - {{ $experience->fin_annee }}
                </div>
            </div>
        </div>
        @endforeach

        <hr>

        @foreach($recruteur->trainings()->get() as $training)
        <div class="cv-preview-item">
            <h2 class="cv-preview-item__heading">{{ $training->formation }}</h2>
            <div class="d-flex align-items-center justify-content-between">
                <strong>{{ $training->etablissement }} - {{ $training->ville }}</strong>
                <div>
                    {{ $training->debut_mois }} - {{ $training->debut_annee }} &nbsp;&nbsp;
                    {{ $training->fin_mois }} - {{ $training->fin_annee }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>