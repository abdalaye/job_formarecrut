@extends('layouts.admin')
@section('title','Liste des niveau d\'études')

@section('content')
    <div class="col-md-4">
        <div class="card shadow-none rounded">
            <div class="card-body">
                <form action="{{ route('admin.niveau_etudes.store') }}" method="post">
                    @csrf
                    @include("admin.niveau_etudes.form")
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
        @foreach ($niveau_etudes as $niveauEtudeItem)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $niveauEtudeItem->name }}</td>
            <td>{!! $niveauEtudeItem->statut_badge !!}</td>
            <td>
                <a href="{{ route('admin.niveau_etudes.update', $niveauEtudeItem) }}"
                    data-toggle="modal" data-target="#modelId"
                    data-id="{{ $niveauEtudeItem->id }}"
                    data-name="{{ $niveauEtudeItem->name }}"
                    data-statut="{{ $niveauEtudeItem->statut }}"
                    class="text-info editModal"><i class="fas fa-edit"></i></a>

                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.niveau_etudes.destroy',$niveauEtudeItem->id),
                    'class' => 'text-danger ml-3',
                    'message_confirmation'=>'Voulez-vous supprimer le niveau suivant :' .$niveauEtudeItem->name,
                    'entity'=>$niveauEtudeItem
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable', ['_classTableWrapper' => "col-md-8"])

    @include('admin.niveau_etudes.modal')

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
