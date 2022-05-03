<div class="col-12">
    <div class="card-body rounded bg-white">
        <div class="row profile-wrapper" id="profile">
            <div class="col-12 user">
                <div class="row">
                    <div class="col-6">
                        <ul class="nav nav-tabs" id="userTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="user-tab" data-toggle="tab"
                                    href="#user" role="tab" aria-controls="profile" aria-selected="false">Informations</a>
                            </li>
                        </ul>
                        <div class="row mt-2 pb-3">
                            <div class="col-8 profil p-2">
                                <div class="tab-content profil_infos px-2 pb-4 w-100" id="myTabContent" style="overflow: auto">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel"
                                        aria-labelledby="user-tab">
                                        <div class="profile-work mt-2 w-100">
                                            <x-profile-item label="Prénom" :value="$candidat->prenom" />
                                            <x-profile-item label="Nom de famille" :value="$candidat->nom" />
                                            <x-profile-item label="Adresse email" :value="$candidat->user->email" />
                                            <x-profile-item label="Numéro de téléphone" :value="$candidat->telephone" />
                                            <x-profile-item label="Adresse physique" :value="$candidat->address" />
                                            <x-profile-item label="Ville/Région" :value="$candidat->city->name . '/'. $candidat->country->name" />
                                            <x-profile-item label="Date de naissance" :value="$candidat->date_naissance" />
                                            <x-profile-item label="Lieu de naissance" :value="$candidat->lieu_naissance" />
                                            <x-profile-item label="Sexe" :value="$candidat->sexe" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 text-right">
                        <ul class="nav nav-tabs border-0 justify-content-end">
                            <li class="nav-item text-right">
                                <a class="nav-link bold" disabled aria-selected="false">Profil</a>
                            </li>
                        </ul>
                        <div class="mt-2 w-100">
                            <div class="p-2 bg-light" style="border-radius: 8px">
                                <div class="row justify-content-center">
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
                                    <div class="col-12 text-center">
                                        <h5 class="text-muted text text-muted mb-0">
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
                                        <a href="{{ route('admin.candidats.edit', $candidat) }}" class="btn btn-secondary"><i class="fa fa-edit"></i> Modifier</a>
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
