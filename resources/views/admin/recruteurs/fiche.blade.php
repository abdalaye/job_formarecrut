<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
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

                                            <x-profile-item label="Logo" :value="$recruteur->logoImg()" />

                                            <x-profile-item label="Nom" :value="$recruteur->nom" />

                                            <x-profile-item label="Ninea" :value="$recruteur->ninea" />

                                            <x-profile-item label="RC" :value="$recruteur->rc" />

                                            <x-profile-item label="Adresse" :value="$recruteur->adresse" />

                                            <x-profile-item label="Nombre d'entreprises" :value="$recruteur->n_employers" />

                                            <x-profile-item label="Propriétaire" :value="$recruteur->owner->fullName" />

                                            <x-profile-item label="Abonnement" :value="$recruteur->abonnement->name" />

                                            <x-profile-item label="Type d'abonnement" :value="$recruteur->abonnement->type" />

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
                                        <div class="profil_image mx-auto">
                                            {{ $recruteur->logoImg(['size' => '100%','class' => 'mx-auto d-block photo', 'id' => 'photo', 'alt' => 'Profil']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <h5 class="text-muted text-md text-muted mb-0">
                                            {{ $recruteur->nom }}
                                        </h5>
                                        <div class="divider"></div>
                                        <h6 class="mb-1">
                                            <span class="badge bg-white shadow-sm rounded p-2 text-uppercase">
                                                <span class="text-primary"><i class="fas fa-user-clock"></i></span>
                                                {{ $recruteur->nom ?? 'non défini' }}
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="col">
                                        <hr>
                                        <a href="{{ route('admin.recruteurs.edit', $recruteur) }}" class="btn btn-secondary">Modifier</a>
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
