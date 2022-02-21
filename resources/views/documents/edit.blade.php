@extends('layouts.admin')
@section('title', "Modification document")

@section('content')
    <div class="col-md-12 pt-2">
        <div class="card rounded shadow-none border-0">
            <div class="card-body">
                <div class="form-group">
                    <label for="type_docuement_id">Type document</label>
                    <div class="d-block"><span class="badge badge-secondary">{{ $typedocument->name ?? "Non défini" }}</span></div>
                </div>
                @if (isset($document))
                    <form method="POST" enctype="multipart/form-data" action="{{ route("documents.update", $document) }}" class="form-group">
                        @csrf
                        @method("PATCH")

                        <label class="text-primary">Veuillez remplir le formulaire du document</label>

                        @include('documents.form')
                    </form>
                @else
                    <div class="form-group">
                        <div class="alert alert-light text-primary text-center">
                            <i class="fas fa-info-circle fa-3x"></i>
                            <p>
                                Pour commencer la création vous devez choisir le type de document à saisir.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@if (isset($document))
@section('scriptBottom')
<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
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
                    <input type="file" required name="pieces[${i}][file]" data-rang="${i}" id="piece_file${i}" accept="{{ $typedocument->accept_extensions }}" name="" class="form-control form-control-sm" id="">
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
    });
    // $('.js-example-basic-multiple').select2();
    if ($("#description").html() !== undefined) {
        CKEDITOR.replace('description', {
            // uiColor: '#F8F9FA'
        });
    }
</script>
@endsection
@endif