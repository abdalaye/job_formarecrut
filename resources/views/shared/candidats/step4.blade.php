@section('title', 'Candidat - Visualisation du CV')

<div class="cv-preview">
    <div class="cv-preview__header mb-4">
        <div class="mb-2">
            {{ $candidat->photoImg() }}
        </div>
        <div class="w-100">
            <h1 class="text-left">{{ $candidat->nomComplet }}</h1>
            <ul class="d-flex justify-content-center flex-column align-items-start" style="list-style: none;margin: 0;padding: 0;">
                <li><i class="fa fa-phone"></i> {{ $candidat->telephone }}</li>
                <li><i class="fa fa-map-marker"></i> {{ $candidat->adresse }}</li>
            </ul>
        </div>
    </div>

    <div class="cv-preview-content col-9">
        <div class="cv-preview-item">
            <h2 class="cv-preview-item__heading">Profil</h2>
            <p>{{ $candidat->description }}</p>
        </div>

        @if($candidat->experiences()->count())
        <h1>Expériences professionnelles</h1>
        @foreach($candidat->experiences()->get() as $experience)
        <div class="cv-preview-item mb-3">
            <h5 class="cv-preview-item__heading">{{ $experience->employeur }} - {{ $experience->city->name }}</h5>
            <div class="d-flex align-items-center justify-content-between">
                <div><strong>{{ $experience->poste }}</strong></div>
                <div>
                    {{ $experience->date_debut }} &dash; {{ $experience->date_fin }}
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                {{ $experience->description }}
            </div>
        </div>
        @endforeach
        <hr>
        @endif


        @if($candidat->formations()->count())
        <h1>Formations</h1>

        @foreach($candidat->formations()->get() as $formation)
        <div class="cv-preview-item mb-3">
            <h5 class="cv-preview-item__heading">{{ $formation->etablissement }} - {{ $formation->ville }}</h5>
            <div class="d-flex align-items-center justify-content-between">
                <strong>{{ $formation->formation }}</strong>
                <div>
                    {{ $formation->date_debut }} &dash; {{ $formation->date_fin }}
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                {{ $formation->description }}
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>