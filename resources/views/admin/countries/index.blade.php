@extends('layouts.admin')
@section('title','Liste des pays')

@section('content')
    <div class="col-md-4">
        <div class="card shadow-none rounded">
            <div class="card-body">
                <form action="{{ route('admin.countries.store') }}" method="post">
                    @csrf
                    @include("admin.countries.form")
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
        @foreach ($countries as $countryItem)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $countryItem->name }}</td>
            <td>{!! $countryItem->statut_badge !!}</td>
            <td>
                <a href="{{ route('admin.countries.update', $countryItem) }}"
                    data-toggle="modal" data-target="#modelId"
                    data-id="{{ $countryItem->id }}"
                    data-name="{{ $countryItem->name }}"
                    data-statut="{{ $countryItem->statut }}"
                    class="text-info editModal"><i class="fas fa-edit"></i></a>

                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.countries.destroy',$countryItem->id),
                    'class' => 'text-danger ml-3',
                    'message_confirmation'=>'Voulez-vous supprimer le pays suivant :' .$countryItem->name,
                    'entity'=>$countryItem
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable', ['_classTableWrapper' => "col-md-8"])

    @include('admin.countries.modal')

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
