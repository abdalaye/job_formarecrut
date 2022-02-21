@extends('layouts.admin')
@section('title','Traitement de document')

@section('content')

    <div class="col-md-12 pt-2">
        <h3 class="text-dark">Fiche du document</h3>
        <div class="card rounded shadow-none border-0">
            <div class="card-body">
                @include("documents.fiche",['document'=>$validation->document,'infos'=>$validation->document->infos,'document_pieces'=>$validation->document->document_pieces])
            </div>
        </div>
    </div>
    <div class="col-12">
        <h3 class="text-dark">Traitement du document</h3>
    </div>
    @include('partials.element.jalons',['jalons'=>$validation->document->jalons,'collaborateur_id'=>$collaborateur_id,'typedocument'=>$validation->document->type_document,'document_pieces'=>$validation->document->document_pieces])
    <div class="col-12 ">
        <div class="card rounded shadow-none border-0">
            <div class="card-body">
                <div class="form-group mb-0">
                    <label class="text-primary">Commentaire</label>
                </div>
                <form method="POST" action="{{route('receptions.validations.update',$validation->id)}}">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-control @error('validation.commentaire') is-invalid @enderror" name="validation[commentaire]" required rows="4" autocomplete="commentaire" autofocus >{{ old('validation.commentaire') ?? $validation->commentaire }} </textarea>
                            @error('validation.commentaire')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-sm btn-primary"> Enregistrer</button>
                        </div>
                    </div>
                </form>
                <hr>
                @if ($is_libre == 1)
                    <form method="POST" action="{{route('receptions.cloturer')}}">
                        @csrf
                        <input type="hidden" name="validation_id" value="{{ $validation->id }}">
                        <input type="hidden" name="statut_validation_id" value="3">
                        <button type="submit" class="btn btn-sm btn-success float-right" onclick="return confirm('Voulez-vous vraiment clôturer les traitements ? ')"   > <i class="fas fa-check-double mr-1"></i> Clôturer les traitements </button>
                    </form>
                @endif
                <form method="POST" action="{{route('receptions.transmettre')}}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary float-right mr-3 border-right-1" onclick="return confirm('Voulez-vous transmettre le document ')"   > <i class="fas fa-share mr-1"></i> Transmettre </button>
                    <input type="hidden" name="id" value="{{ $validation->id }}">
                    <input type="hidden" name="statut_validation_id" value="3">
                    @if ($is_libre == 1)
                        <div class="float-right mr-2 ml-2" style="width:250px">
                            @include('partials.components.selectElementTab', [
                                'options' => $collaborateurs,
                                "display" => "nom_complet",
                                "name" => "collaborateur_id",
                                "id" => "collaborateur_id",
                                "default" => "",
                            ])
                        </div>
                    @endif
                    @if ($is_libre == 1)
                        <label class="text-primary float-right mt-1 ">Transmettre le document à </label>
                    @endif
                </form>
            </div>
        </div>
    </div>
   {{-- Datatable extension --}}
@endsection

@section('scriptBottom')
    <script>
        $(function() {
            var i = 0;

            $('body').on('click','#add_piece',function() {
                addLine();
            });

            $('body').on('click','.removePiece',function() {
                let rang = $(this).data('rang');
                removeLine(rang);
            });

            $('body').on('change','input[type=file]',function() {
                let val = $(this).val();
                let rang = $(this).data("rang");

                if(val) {
                    let file = $(this)[0].files[0];
                    if(file) {
                        $('#piece_name'+rang).val(file.name.split('.').slice(0, -1).join('.'));
                    }
                }
            });


            function addLine() {
                i++;
                $("#tableauPieces").append(`<tr id="ligne${i}">
                    <td>
                        <input type="file" required name="pieces[${i}][file]" data-rang="${i}" id="piece_file${i}" accept="{{ $validation->document->type_document->accept_extensions }}" name="" class="form-control form-control-sm" id="">
                    </td>
                    <td>
                        <input maxlength="255" type="text" required name="pieces[${i}][name]" data-rang="${i}" id="piece_name${i}" class="form-control form-control-sm" id="">
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger removePiece" data-rang="${i}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`);
            }

            function removeLine(rang) {
                i--;
                $('tr#ligne'+rang).remove();
            }

            $('body').on('click','.editModal',function() {
                var date = $(this).data('date');
                console.log($(this).data());
              //  var date_format = dateFormat(date_crea, "Y-d-m");
                $('#form-2').attr('action', $(this).attr('href'));
                $('#id').val($(this).data('id'));
                $('#action').val($(this).data('titre'));
                $('#date_creation').val(date);
                $('#description').val($(this).data('descrip_traitement'));
            });

            $('body').on('click','.jalonDescription',function() {
                //alert('bonjour');
                $('#descrip_traitement').val($(this).data('descrip_jalon'));
                $('#collab').text($(this).data('colab'));
                $('#lib').text($(this).data('lib'));
                $('#date').text($(this).data('date'));
            });

            $('body').on('click','#modif_piece',function() {
                modifLine();
            });

            $('body').on('click','.1_removePiece',function() {
                let rang_1 = $(this).data('rang_1');
                removeLine_1(rang_1);
            });

            $('body').on('change','input[type=file]',function() {
                let val_1 = $(this).val();
                let rang_1 = $(this).data("rang_1");

                if(val_1) {
                    let file = $(this)[0].files[0];
                    if(file) {
                        $('#1_piece_name'+rang_1).val(file.name.split('.').slice(0, -1).join('.'));
                    }
                }
            });

            function removeLine_1(rang) {
                i--;
                $('tr#1_ligne'+rang).remove();
            }


            function modifLine() {
                i++;
                $("#1_tableauPieces").append(`<tr id="1_ligne${i}">
                    <td>
                        <input type="file" required name="pieces[${i}][file]" data-rang_1="${i}" id="1_piece_file${i}" accept="{{ $validation->document->type_document->accept_extensions }}" name="" class="form-control form-control-sm" id="">
                    </td>
                    <td>
                        <input maxlength="255" type="text" required name="pieces[${i}][name]" data-rang_1="${i}" id="1_piece_name${i}" class="form-control form-control-sm" id="">
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger 1_removePiece" data-rang_1="${i}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`);
            }

        });




    </script>

@endsection
