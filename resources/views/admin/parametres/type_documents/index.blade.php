@extends('layouts.admin')

@section('title', "Types de document")

@section('actions')
    <div class="actions dropdown-menu-right action-btn">
        <a href="#"
            type="button"
            data-toggle="modal"
            data-target="#creationModal"
            class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Nouveau type de document
        </a>
    </div>
@endsection

@section('content')

    {{-- Liste Type doucments --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        {{-- <td>Icône</td> --}}
        <td>Nature document</td>
        <td>Type</td>
        <td>Actions</td>
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($type_documents as $typeDocument)
        <tr>
            <td>{{ $i }} </td>
            {{-- <td>
                @if (isset($typeDocument->icon))
                    <img src="{{ asset($typeDocument->icon) }}" alt="Icone document" class="img-rounded img-size-32">
                @else
                    <i class="fas fa-file-alt"></i>
                @endif
            </td> --}}
            <td>{{ $typeDocument->name ?? '---' }}</td>
            <td>{!! $typeDocument->authorised_extensions_badge !!}</td>
            <td>
                <a href="{{ route('admin.typedocuments.show', $typeDocument) }}" class="btn btn-light btn-xs">
                    <i class="fa fa-eye text-primary"></i>
                </a>
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable')

    {{-- form de la page --}}
    @include('admin.parametres.type_documents.modal')
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
            //         url : "{{ route('admin.typedocuments.store') }}",
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
            $('#editForm input[name=authorised_extensions]').val($(this).data("authorised_extensions"));
            $('#editForm').attr('action', $(this).attr('href'));
        });
    </script>
@endsection
