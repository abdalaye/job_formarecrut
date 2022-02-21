@extends('layouts.admin')

@section('title', "Création d'un type de document")

@section('customCss')
    <style>
        tr, td {
            padding:0.4rem 0.75rem !important;
        }
        .select2-selection__rendered {
            padding:0  8px !important;
        }
    </style>
@endsection
@if ($typedocument->statut)
@section('actions')
<div class="actions dropdown-menu-right action-btn">
    <a href="{{ route('admin.typedocuments.show', $typedocument) }}" class="btn btn-sm btn-primary">
        <i class="fas fa-eye"></i> Visualiser
    </a>
</div>
@endsection
@else
    @section('actionItems')
        <a href="{{ route('admin.typedocuments.show', $typedocument) }}" class="dropdown-item text-info">
            <i class="fas fa-eye"></i>Visualiser
        </a>
        @if (!$typedocument->statut)
            @if(isset($chaine))
            <a type="button" href="#"
                onclick="event.preventDefault();
                if(confirm('Vous êtes sur le point de publier ce type de document, il sera désormais disponible en dêpot ?')){
                    document.getElementById('update{{ $typedocument->id }}').submit();
                }" class="dropdown-item">
                <i class="fas fa-check"></i> Publier
            </a>
            @include("partials.components.virtualFormElement",[
                'donnes' => ['statut' => 1],
                'ID' => "update$typedocument->id",
                'method' => 'PATCH',
                'url' => route('admin.typedocuments.publish', $typedocument)
            ])
            @endif

            <a type="button" href="#"
                onclick="event.preventDefault();
                if(confirm('Voulez - vous vraiment supprimer ce type de document ?')){
                    document.getElementById('supression_typedoc{{ $typedocument->id }}').submit();
                }" class="dropdown-item text-danger">
                <i class="fas fa-trash"></i> Supprimer
            </a>
            @include("partials.components.virtualFormElement",[
                'donnes' => ['statut' => 1],
                'ID' => "supression_typedoc$typedocument->id",
                'method' => 'DELETE',
                'url' => route('admin.typedocuments.destroy', $typedocument)
            ])
            {{-- @include("partials.components.deleteBtnElement", [
                'btnInnerHTML' => '<i class="fas fa-trash"></i> Supprimer',
                'class' => 'dropdown-item text-danger',
                'message_confirmation' => "Voulez - vous vraiment supprimer ce type de document ?",
                'entity' => $typedocument,
                'url' => route('admin.typedocuments.destroy', $typedocument)
            ]) --}}
        @endif
    @endsection
    @section('actions')
        @include("partials.components.dropdownElement")
    @endsection
@endif

@section('content')
    {{-- Contenu de la page --}}
    <div class="col-md-12 pt-2">
        @include("admin.parametres.type_documents.demarrage_document")
    </div>

    <div class="col-md-12 pt-2">
        @include("admin.parametres.type_documents.parcours_document")
    </div>

    <div class="col-md-12 pt-2">
        @include("admin.parametres.type_documents.restriction_depot")
    </div>

    <div class="col-md-12 pt-2">
        @include("admin.parametres.type_documents.restriction_consultation")
    </div>
    @if (isset($chaine))
        @include('admin.parametres.type_documents.modal_manager')
    @endif
    @include("admin.parametres.type_documents.form_field_modal")
    @include("admin.parametres.type_documents.form_edit_field_modal")
@endsection

@section('scriptBottom')
    <script src="{{ asset('js/partials/configureField.js') }}"></script>
    <script>
        //Ajax form message
        $('body').on('click', '.editModal', function() {
            let collaborateur_id = $(this).data('collaborateur_id');
            let url = $(this).data('url');
            let rang = $(this).data('rang');
            $('#editForm').attr('action', url);
            $('#collaborateur_id_modal').val(collaborateur_id);
            $('#rangText').text(rang);
            $('#collaborateur_id_modal').select2();
        });

        $('body').on('change','#consultation_direction_ids,#consultation_departement_ids,#consultation_service_ids', function() {
            if($(this).val() && $(this).val().length > 0) {
                let consultation_collaborateurs = $('#consultation_collaborateur_ids').val();
                if(consultation_collaborateurs && consultation_collaborateurs.indexOf('') !== -1) {
                    consultation_collaborateurs.splice(0,1);
                    $('#consultation_collaborateur_ids').val(consultation_collaborateurs).change();
                }
            }
        });

        $('body').on('change','#restriction_direction_ids,#restriction_departement_ids,#restriction_service_ids', function() {
            if($(this).val() && $(this).val().length > 0) {
                let restriction_collaborateurs = $('#restriction_collaborateur_ids').val();
                if(restriction_collaborateurs && restriction_collaborateurs.indexOf('') !== -1) {
                    restriction_collaborateurs.splice(0,1);
                    $('#restriction_collaborateur_ids').val(restriction_collaborateurs).change();
                }
            }
        });

        $('body').on('change','input[name=is_libre]', function() {
            if($('#libre1').is(':checked')) {
                if(!$('.is_libre').hasClass('d-none')) $('.is_libre').addClass('d-none');
            } else {
                if($('.is_libre').hasClass('d-none')) $('.is_libre').removeClass('d-none');
            }
        });
    </script>
@endsection
