@extends('layouts.admin')
@section('title','Liste des villes')

@section('content')
    <div class="col-md-4">
        <div class="card shadow-none rounded">
            <div class="card-body">
                <form action="{{ route('admin.cities.store') }}" method="post">
                    @csrf
                    @include("admin.cities.form")
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
        <td>Pays</td>
        <td>Etat</td>
        <td>Actions</td>
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
    @php $i = 1 @endphp
        @foreach ($cities as $cityItem)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $cityItem->name }}</td>
            <td>{{ $cityItem->country->name ?? '---' }}</td>
            <td>{!! $cityItem->statut_badge !!}</td>
            <td>
                <a href="{{ route('admin.cities.update', $cityItem) }}"
                    data-toggle="modal" data-target="#modelId"
                    data-id="{{ $cityItem->id }}"
                    data-name="{{ $cityItem->name }}"
                    data-statut="{{ $cityItem->statut }}"
                    data-country_id="{{ $cityItem->country_id }}"
                    class="text-info editModal"><i class="fas fa-edit"></i></a>

                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.cities.destroy',$cityItem->id),
                    'class' => 'text-danger ml-3',
                    'message_confirmation'=>'Voulez-vous supprimer la ville suivante :' .$cityItem->name,
                    'entity'=>$cityItem
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable', ['_classTableWrapper' => "col-md-8"])

    @include('admin.cities.modal')

@endsection

@section('scriptBottom')
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
    <script>
        $(function() {
            $("body").on('click', '.editModal', function() {
                let name = $(this).data('name');
                let statut = $(this).data('statut');
                let country_id = $(this).data('country_id');
                let urlAction = $(this).attr("href");
                $('#formModal').attr('action', urlAction);
                $('#nameModal').val(name);
                $('#statutModal').val(statut);
                $('#country_idModal').val(country_id);
            });
        });
    </script>
@endsection
