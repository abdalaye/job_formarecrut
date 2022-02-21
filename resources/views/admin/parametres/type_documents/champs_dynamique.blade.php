<div class="col-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded shadow-none border-0 mb-0 pb-0">
                <div class="card-body pb-0">
                    <div class="form-group">
                        <label class="text-primary" title="Dans cette section il s'agira de définir les champs additionnels du formulaire de dêpot de document">Formulaire de dépôt -  <i class="text-muted fas fa-question-circle"></i></label>
                    </div>
                    <div class="form-group">
                        {{-- <label>Les champs du document à déposer</label> --}}
                        <table class="table table-striped table-hover table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Champ</th>
                                <th>Requis</th>
                                <th>Intitulé</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($staticFields as $fieldStatic)
                                <tr>
                                    <td><span class="badge badge-secondary">Base</span></td>
                                    <td>OUI</td>
                                    <td>
                                        {{ $fieldStatic['name'] }}
                                    </td>
                                    <td>
                                        <span class="badge badge-info border small">{{ $fieldStatic['type'] }}</span>
                                    </td>
                                    <td>
                                        ----
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($fields as $field)
                                    <tr>
                                        <td> <span class="badge badge-info">Additionnel</span></td>
                                        <td> {{ $field->requis == 1 ? 'OUI' : "NON" }}</td>
                                        <td>
                                            {{ $field->name }}
                                        </td>
                                        <td><span class="badge badge-info border small"> {{ $field->type_field->name }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.fields.update', $field->id) }}" class="bg-white btn btn-sm editStatic"
                                                data-attribut="{{ $field->attribut }}"
                                                data-ref="{{ $field->ref }}"
                                                data-type="{{ $field->type_field_id }}"
                                                data-dynamic="{{ isset($field->dynamic) && !$field->dynamic ? '0' : '1' }}"
                                                data-lignes="{{ $field->lignes }}"
                                                data-col="{{ $field->col }}"
                                                data-choices="{{ $field->choices }}"
                                                data-nom="{{ $field->name }}"
                                                data-niveau="{{ $field->niveau }}"
                                                data-requis="{{ $field->requis }}"
                                                data-label="{{ $field->label }}"
                                                data-reference="{{ $field->reference }}"
                                                data-toggle="modal"
                                                data-target="#staticModal">
                                                <i class="fa fa-edit text-success"></i>
                                            </a>
                        
                                            @include('partials.components.deleteBtnElement',[
                                            'url'=>route('admin.fields.destroy',$field->id),
                                            'message_confirmation'=>'Voulez-vous supprimer le champ: ' .$field->name,
                                            'btnInnerHTML'=>'<i class="fa fa-times text-danger"></i>',
                                            'class'=>'btn bg-white btn-sm',
                                            'entity'=>$field
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group text-right">
                        <a href="#" 
                           class="btn btn-warning fieldAddModal"
                           type="button"
                           data-toggle="modal"
                           data-target="#fieldAddModal"
                           >
                           <i class="fas fa-plus-circle mr-1"></i> 
                           Créer un champ additionnel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>