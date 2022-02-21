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
                                        @if (isset($collaborateur))
                                        <div class="profile-work mt-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Prénom</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->prenom }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Nom</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->nom }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Genre</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ isset($collaborateur->genre) == 1 ? 'Homme' : ' Femme'}}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Poste</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->poste ?? "Non défini" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">IGG</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->igg }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Matricule</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->matricule }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Adresse Email</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $user->email }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Téléphone</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->telephone }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Mobile</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->mobile }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-100">Managers (n-3)</strong>
                                                {{-- <div class="text-left pl-2 w-50 bg-light rounded"></div> --}}
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Manager n+1</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->manager1->nom_complet ?? "----" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Manager n+2</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->manager2->nom_complet ?? "----" }}</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center pb-3">
                                                <strong class="w-50">Manager n+3</strong>
                                                <div class="text-left pl-2 w-50 bg-light rounded">{{ $collaborateur->manager3->nom_complet ?? "----" }}</div>
                                            </div>
                                        </div>
                                        @else
                                            Aucune Information du collaborateur
                                        @endif
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
                                            <img src="{{ old('collaborateur.photo') ?? isset($collaborateur->photo) ? $user->photo : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ5W9rtnI5Yl0rQCZiNRUNjSqRH7zeouAIlJ3kJ-MBqNccffOkGcJvq7wcbatnzgxUo4&usqp=CAU' }}" alt="Profil"  id="img-logo" class="rounded mx-auto d-block photo" id="photo" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <h5 class="text-muted text-md text-muted mb-0">
                                            {!! $user->nomComplet !!}
                                            @if ($collaborateur->poste)
                                                <br>
                                                <span class="text-info font-italic">{{ $collaborateur->poste }}</span>
                                            @endif
                                        </h5>
                                        <div class="divider"></div>
                                        <h6 class="mb-1">
                                            <span class="badge bg-white shadow-sm rounded p-2 text-uppercase">
                                                <span class="text-primary"><i class="fas fa-user-clock"></i></span>
                                                {{ $user->profil_name ?? 'non défini' }}
                                            </span>
                                        </h6>
                                        <h6 class="mb-1">
                                            <span class="badge bg-white shadow-sm rounded p-2 text-uppercase">
                                                <span class="text-primary">IGG</span>
                                                {{ isset($collaborateur) ? $collaborateur->igg : 'non défini' }}
                                            </span>
                                        </h6>
                                        <h6 class="mb-1">
                                            <span class="badge bg-white shadow-sm rounded p-2 text-uppercase">
                                                <span class="text-uppercase text-primary">Matricule</span>
                                                {{ isset($collaborateur) ? $collaborateur->matricule : 'non défini' }}
                                            </span>
                                        </h6>
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