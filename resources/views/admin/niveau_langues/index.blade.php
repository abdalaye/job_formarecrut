@extends('layouts.admin')
@section('title','Liste des niveau de langue')

@section('content')
    <div class="col-md-4">
        <div class="card shadow-none rounded">
            <div class="card-body">
                <form action="{{ route('admin.niveau_langues.store') }}" method="post">
                    @csrf
                    @include("admin.niveau_langues.form")
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Ajouter</button>
                    </div>
                </form>

                {{-- Range items --}}
                @include('partials.element.form_range', [
                    'donnees' => $niveau_langues,
                    'entityModel' => get_class($niveauLangue)
                ])
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
        @foreach ($niveau_langues as $niveauLangueItem)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $niveauLangueItem->name }}</td>
            <td>{!! $niveauLangueItem->statut_badge !!}</td>
            <td>
                <a href="{{ route('admin.niveau_langues.update', $niveauLangueItem) }}"
                    data-toggle="modal" data-target="#modelId"
                    data-id="{{ $niveauLangueItem->id }}"
                    data-name="{{ $niveauLangueItem->name }}"
                    data-statut="{{ $niveauLangueItem->statut }}"
                    class="text-info editModal"><i class="fas fa-edit"></i></a>

                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.niveau_langues.destroy',$niveauLangueItem->id),
                    'class' => 'text-danger ml-3',
                    'message_confirmation'=>'Voulez-vous supprimer le niveau suivant :' .$niveauLangueItem->name,
                    'entity'=>$niveauLangueItem
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable', ['_classTableWrapper' => "col-md-8"])

    @include('admin.niveau_langues.modal')

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
