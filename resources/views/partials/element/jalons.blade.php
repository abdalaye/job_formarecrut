
@section('cardHeader')
    <div class="col-12">
        <div class="form-group my-0">
            <label class="text-primary">Jalons de traitement</label>
            <a href="#" class="btn btn-sm btn-primary jalonModal float-right" type="button" data-toggle="modal" data-target="#jalonModal">
                <i class="fas fa-plus-circle mr-1"></i>
                Ajouter un jalon
            </a>
        </div>
    </div>
@endsection
@section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Libellé</td>
        <td>Collaborateur</td>
        <td>Date</td>
        <td>Déscription</td>
        <td>Actions</td>
    </tr>
@endsection
@section('tableBody')
    @php $i = 1 @endphp
    @foreach ($jalons as $j=> $jalon)

        <tr>
            <td>{{  $j+1  }}</td>
            <td>{{  $jalon->action  }}</td>
            <td>{{  $jalon->collaborateur->prenom.' '.$jalon->collaborateur->nom  }}</td>
            <td>{{   date('d-m-Y', strtotime($jalon->date_creation)) }}</td>
            <td class="d-inline-block text-truncate" style="max-width: 150px;">
                {{ $jalon->description }}
            </td>

            <td>
                <a href="#" class="jalonDescription btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-id="{{ $jalon->id }}"
                    data-colab="{{  $jalon->collaborateur->prenom.' '.$jalon->collaborateur->nom }}"
                    data-lib="{{ $jalon->action }}"
                    data-date="{{ date('d-m-Y', strtotime($jalon->date_creation)) }}"
                    data-descrip_jalon="{{ $jalon->description }}"
                    data-target="#vueJalonModal">
                    <i class="fa fa-eye"></i>

                </a>
                @if ($collaborateur_id == $jalon->collaborateur_id)
                    <a href="{{ route('receptions.jalons.update', $jalon->id)  }}" class="btn btn-primary btn-sm editModal"
                        data-toggle="modal"
                        data-id="{{ $jalon->id }}"
                        data-titre="{{ $jalon->action }}"
                        data-date="{{ date('Y-m-d', strtotime($jalon->date_creation)) }}"
                        data-descrip_traitement="{{ $jalon->description }}"
                        data-target="#editModal">
                            <i class="fa fa-edit"></i>
                    </a>
                    @include('partials.components.deleteBtnElement',[
                        'url'=>route('receptions.jalons.destroy',$jalon->id),
                        'message_confirmation'=>'Voulez-vous vraiment supprimer cet jalon ?',
                        'btnInnerHTML'=>' <i class="fa fa-trash"></i>',
                        'class'=>'btn btn-sm btn-primary',
                        'entity'=>$jalon
                    ])
                @endif
            </td>
        </tr>
        @php $i++ @endphp
    @endforeach
@endsection

@include('partials.element.modalJalon')
@include('partials.element.viewJalonModal')
@include('layouts.sub_layouts.datatable')

<div class="modal fade mt-5" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" id="form-2" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-header">
                <h3 class="text-primary h6 text-uppercase font-weight-bold modal-title" id="editLabel">
                    Modification d'un Jalon de traitement
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="action">Libellé</label>
                    <input type="text" name="jalon[action]" id="action" class="form-control">
                    @error('jalon.action')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="date_creation">Date</label>
                    <input type="date" name="jalon[date_creation]" id="date_creation" class="form-control">
                    @error('jalon.date_creation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="jalon[description]" id="description" rows="3" class="form-control"></textarea>
                    @error('jalon.description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Les pieces à joindre (<small class="small text-muted">Format acceptés: </small> <small class="small text-primary text-uppercase">{{ implode(", ",$typedocument->authorised_extensions_array) }}</small>)</label>
                    <table class="table table-borderless table-striped border">
                        <thead>

                            <th>Nom du fichier</th>
                            <th>
                                <button class="btn btn-sm btn-primary float-right" type="button" id="modif_piece"><i class="fas fa-plus-circle"></i></button>
                            </th>
                        </thead>
                        <tbody id="1_tableauPieces">

                            @if (isset($document_pieces) && count($document_pieces))
                                <form action="" class="d-none"></form>
                                @foreach ($document_pieces as $piece)

                                    @if ($piece->jalon_id)
                                        <tr>

                                            <td>
                                                {{ $piece->name }}
                                            </td>
                                            <td>
                                                @include("partials.components.deleteBtnElement", [
                                                    'url' => route('document_pieces.destroy', $piece->id),
                                                    'class' => 'float-right ',
                                                    'entity' => $piece,
                                                    'btnInnerHTML' =>  '<button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>'
                                                ])
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach
                            @endif
                            @if (!(isset($document_pieces) && count($document_pieces)))
                                <tr id="1_ligne0">
                                    <td>
                                        <input type="file" required name="pieces[0][file]" data-rang="0" id="1_piece_file0" accept="{{ $typedocument->accept_extensions }}" name="" class="form-control form-control-sm" id="">
                                    </td>
                                    <td>
                                        <input maxlength="255" type="text" required name="pieces[0][name]" data-rang="0" id="1_piece_name0" class="form-control form-control-sm" id="">
                                    </td>
                                    <td>
                                        (requis)
                                        {{-- <button class="btn btn-sm btn-danger removePiece" data-rang="0"><i class="fas fa-trash"></i></button> --}}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
      </div>
    </div>
</div>
