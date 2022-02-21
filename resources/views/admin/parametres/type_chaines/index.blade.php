@extends('layouts.admin')

@section('title', "Types de document")

@section('actions')
    @section('actionItems')
        <a href="#"
            type="button"
            data-toggle="modal"
            data-target="#creationModal"
            class="dropdown-item">
            <i class="fas fa-plus-circle text-primary"></i> Nouveau type de document
        </a>
    @endsection
    @include("partials.components.dropdownElement")
@endsection

@section('content')

    {{-- Liste Type doucments --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Libellé</td>
        <td>Type</td>
        <td>Actions</td>
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($type_chaines as $typeChaine)
        <tr>
            <td>{{ $i }} </td>
            <td>{!! $typeChaine->name !!}</td>
            <td>{{ $typeChaine->is_libre ? "Libre" : "Pré-défini" }}</td>
            <td>
                <a href="{{ route('admin.typechaines.update', $typeChaine->id) }}"
                    type="button"
                    data-toggle="modal"
                    data-target="#editModal"
                    data-name="{{ $typeChaine->name }}"
                    data-is_libre="{{ $typeChaine->is_libre }}"
                    class="btn btn-light btn-xs editBtn">
                    <i class="fa fa-edit text-warning"></i>
                </a>
                <a href="#" id="{{ $typeChaine->id }}" class="btn btn-light btn-xs">
                    <i class="fa fa-trash text-primary"></i>
                </a>
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable')

    {{-- form de la page --}}
    @include('admin.parametres.type_chaines.modal')
@endsection

@section('scriptBottom')
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])

    <script>
        // $('body').on('submit','#creationModal form', function() {
            //     let data = new FormData();
            //     let inputFile = $('#creationModal form input[name=icon]');
            //     let file_value = $(inputFile).val();

            //     data.append("name", $('#creationModal form input[name=name]').val());
            //     data.append("authorised_extensions", $('#creationModal form input[name=authorised_extensions]').val());
            //     if(file_value && file_value.trim() !== "") {
            //         data.append("icon",$(inputFile)[0].files[0]);
            //     }

            //     $('#creationModal').modal('hide');

            //     $.ajax({
            //         url : "{{ route('admin.typechaines.store') }}",
            //         type: "POST",
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         data : data,
            //         success: function(response){
            //             $('#containerTable').html(response.html);
            //         }
            //     });

            //     return false;
        // });
        $('body').on('click','.editBtn', function() {
            let data = new FormData();
            $('#editForm input[name=name]').val($(this).data("name"));
            $('#editForm input[name=is_libre]').val($(this).data("is_libre"));
            $('#editForm').attr('action', $(this).attr('href'));
        });
    </script>
@endsection
