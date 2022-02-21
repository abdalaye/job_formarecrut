@extends('layouts.admin')
@section('title','Directions')

@section('actions')
    <div class="actions dropdown-menu-right action-btn">
        <a href="{{ route('admin.directions.update') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-retweet"></i> Mettre à jour les directions
        </a>
    </div>
@endsection

@section('content')
    {{-- table header --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        {{-- <td>Image</td> --}}
        <td>Nom</td>
        {{-- <td>Etat</td> --}}
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
    @php $i = 1 @endphp
        @foreach ($directions as $direction)
            <tr>
                <td>{{ $i }}</td>
                {{-- <td>
                    @if ($direction->image)
                        <img class="img-thumbnail bg-primary logo" src="{{ $direction->image }}" style="height: 30px" alt="Logo">
                    @endif
                </td> --}}
                <td>{{ $direction->name }}</td>
                {{-- <td>
                    {!! $direction->etatBadge !!}
                </td> --}}
            </tr>
            @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable')

@endsection

@section('scriptBottom')
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
@endsection
