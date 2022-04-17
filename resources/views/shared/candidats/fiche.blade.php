<div class="col-md-12">
    <div class="card-body rounded bg-white">
        <div class="row profile-wrapper" id="profile">
            <div class="col-md-12 user">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-tabs" id="userTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="user-tab" data-toggle="tab"
                                    href="#user" role="tab" aria-controls="profile" aria-selected="false">Informations</a>
                            </li>
                        </ul>
                        <div class="row mt-2 pb-3">
                            <div class="col-md-8 profil p-2">
                                <div class="tab-content profil_infos px-2 pb-4 w-100" id="myTabContent" style="overflow: auto">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        <div class="profile-work mt-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Prénom</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->prenom }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Nom</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->nom }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Adresse Email</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->user->email ?? "---" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Téléphone</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->telephone ?? "---" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Adresse complète</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->adresse ?? "---" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Ville/Région</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->city->name ?? "---" }}/{{ $candidat->country->name ?? "---" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Date de naissance</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->date_naissance ?? "---" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Lieu de naissance</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->lieu_naissance ?? "---" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Sexe</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $candidat->sexe ?? "---" }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                        <ul class="nav nav-tabs border-0 justify-content-end">
                            <li class="nav-item text-right">
                                <a class="nav-link bold" disabled aria-selected="false">Profil</a>
                            </li>
                        </ul>
                        <div class="mt-2 w-100">
                            <div class="p-2 bg-light" style="border-radius: 8px">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 profil">
                                        <div class="profil_image mx-auto text-center d-flex align-items-center justify-content-center">
                                            @if (isset($candidat->url_cv))
                                            <img
                                                src="{{ isset($candidat->url_cv) ? asset($candidat->url_cv) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/OOjs_UI_icon_userAvatar-progressive.svg/1024px-OOjs_UI_icon_userAvatar-progressive.svg.png' }}"
                                                alt=""
                                                id="img-logo"
                                                class="rounded mx-auto d-block photo" id="photo" />

                                            @else
                                                <i class="fas fa-user-circle fa-8x text-muted"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <h5 class="text-muted text-md text-muted mb-0">
                                            {!! $candidat->user->nom_complet ?? "---" !!}
                                        </h5>
                                        <div class="divider"></div>
                                        <h6 class="mb-1">
                                            <span class="badge bg-white shadow-sm rounded p-2 text-uppercase">
                                                <span class="text-primary"><i class="fas fa-user-clock"></i></span>
                                                Candidat
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col">
                                        <hr>
                                        <a href="{{ route('admin.candidats.edit', $candidat) }}" class="btn btn-secondary">Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
