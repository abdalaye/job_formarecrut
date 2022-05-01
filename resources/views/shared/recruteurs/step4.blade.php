<div class="cv-preview">
    <div class="cv-preview__header mb-4">
        <div class="mb-2">
            {{ $recruteur->logoImg() }}
        </div>
        <div class="w-100">
            <h1 class="text-left">{{ $recruteur->nom }}</h1>
            <ul class="d-flex justify-content-center flex-column align-items-start" style="list-style: none;margin: 0;padding: 0;">
                <li><i class="fa fa-phone"></i> {{ $recruteur->phone }}</li>
                <li><i class="fa fa-map-marker"></i> {{ $recruteur->adresse }}</li>
            </ul>
        </div>
    </div>

    <div class="cv-preview-content col-9">
        <div class="cv-preview-item">
            <h2 class="cv-preview-item__heading">Profil</h2>
            <p>{{ $recruteur->description }}</p>
        </div>

        @if($recruteur->pro_experiences()->count())
        <h1>Expériences professionnelles</h1>
        @foreach($recruteur->pro_experiences()->get() as $experience)
        <div class="cv-preview-item mb-3">
            <h5 class="cv-preview-item__heading">{{ $experience->employeur }} - {{ $experience->ville }}</h5>
            <div class="d-flex align-items-center justify-content-between">
                <div><strong>{{ $experience->poste }}</strong></div>
                <div>
                    {{ $experience->date_debut }} &dash; {{ $experience->date_fin }}
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                {{ $experience->description }}
                <form style="display: inline;" method="post" action="{{ route('admin.recruteurs.removeExperience', ['pro_experience' => $experience->id, 'entreprise' => $recruteur->id]) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-link text-danger btn-xs"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
        @endforeach
        <hr>
        @endif


        @if($recruteur->trainings()->count())
        <h1>Formations</h1>

        @foreach($recruteur->trainings()->get() as $training)
        <div class="cv-preview-item mb-3">
            <h5 class="cv-preview-item__heading">{{ $training->etablissement }} - {{ $training->ville }}</h5>
            <div class="d-flex align-items-center justify-content-between">
                <strong>{{ $training->formation }}</strong>
                <div>
                    {{ $training->date_debut }} &dash; {{ $training->date_fin }}
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                {{ $training->description }}
                <form style="display: inline;" method="post" action="{{ route('admin.recruteurs.removeTraining', ['training' => $training->id, 'entreprise' => $recruteur->id]) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-link text-danger btn-xs"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>