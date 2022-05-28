<div class="profile-work mt-2 w-100">
    <div class="d-flex justify-content-between align-items-center pb-3">
        <strong class="w-50">Titre</strong>
        <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->titre }}</div>
    </div>

    <div class="d-flex justify-content-between align-items-center pb-3">
        <strong class="w-50">Adresse</strong>
        <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->address }}</div>
    </div>

    <div class="d-flex justify-content-between align-items-center pb-3">
        <strong class="w-50">Secteur d'activité</strong>
        <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->secteur->name ?? '---' }}</div>
    </div>

    <div class="d-flex justify-content-between align-items-center pb-3">
        <strong class="w-50">Entreprise</strong>
        <div class="text-left pl-2 w-50 bg-light rounded">{{ $offre->entreprise->nom ?? '---' }}</div>
    </div>

    <div class="d-flex justify-content-between align-items-center pb-3">
        <strong class="w-50">Date d'expiration</strong>
        <div class="text-left pl-2 w-50 bg-light rounded">{{ to_french_date($offre->expires_at) }}</div>
    </div>

    <div>
        <strong class="w-100 d-block">Description</strong>
        <div class="text-left my-2 p-2 w-100 bg-light rounded">{!! $offre->description !!}</div>
    </div>
</div>
