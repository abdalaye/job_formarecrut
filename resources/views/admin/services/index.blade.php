@extends('layouts.admin')
@section('title','Services')

@section('actions')
    <div class="actions dropdown-menu-right action-btn">
        <a href="{{ route('admin.services.update') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-retweet"></i> Mettre à jour les services
        </a>
    </div>
@endsection

@section('content')
    {{-- table header --}}
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>Nom </td>
            <td>Département</td>
            <td>Direction</td>
            {{-- <td>Etat</td> --}}
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($services as $service)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->departement->name ?? '---'}}</td>
            <td>{{ $service->direction->name ?? "---"  }}</td>
            {{-- <td>{!! $service->etatBadge !!}</td> --}}
        </tr>
        @php $i++ @endphp
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable')

@endsection
@section('scriptBottom')
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
    <script src="{{ asset('js/partials/modalSelect.js') }}"></script>

@endsection
