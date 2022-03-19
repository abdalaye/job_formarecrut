@extends('layouts.admin')
@section('title','Liste des secteurs')

@section('content')
    <div class="col-md-4">
        <div class="card shadow-none rounded">
            <div class="card-body">
                <form action="{{ route('admin.secteurs.store') }}" method="post">
                    @csrf
                    @include("admin.secteurs.form")
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- table header --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Nom</td>
        <td>Etat</td>
        <td>Actions</td>
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
    @php $i = 1 @endphp
        @foreach ($secteurs as $secteurItem)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $secteurItem->name }}</td>
            <td>{!! $secteurItem->statut_badge !!}</td>
            <td>
                <a href="{{ route('admin.secteurs.update', $secteurItem) }}"
                    data-toggle="modal" data-target="#modelId"
                    data-id="{{ $secteurItem->id }}"
                    data-name="{{ $secteurItem->name }}"
                    data-statut="{{ $secteurItem->statut }}"
                    class="text-info editModal"><i class="fas fa-edit"></i></a>

                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.secteurs.destroy',$secteurItem->id),
                    'class' => 'text-danger ml-3',
                    'message_confirmation'=>'Voulez-vous supprimer le secteur suivant :' .$secteurItem->name,
                    'entity'=>$secteurItem
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable', ['_classTableWrapper' => "col-md-8"])

    @include('admin.secteurs.modal')

@endsection

@section('scriptBottom')
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
    <script>
        $(function() {
            $("body").on('click', '.editModal', function() {
                let name = $(this).data('name');
                let statut = $(this).data('statut');
                let urlAction = $(this).attr("href");
                $('#formModal').attr('action', urlAction);
                $('#nameModal').val(name);
                $('#statutModal').val(statut);
            });
        });
    </script>
@endsection
