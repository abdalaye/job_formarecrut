@extends('layouts.admin')
@section('title','Départements')

@section('actions')
    <div class="actions dropdown-menu-right action-btn">
        <a href="{{ route('admin.departements.update') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-retweet"></i> Mettre à jour les départements
        </a>
    </div>
@endsection

@section('content')
    {{-- table header --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Nom </td>
        <td>Direction</td>
        {{-- <td>Etat</td> --}}
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
    @php $i = 1 @endphp
        @foreach ($departements as $departement)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $departement->name }}</td>
            <td>{{ isset($departement->direction) ? $departement->direction->name : '---' }}</td>
            {{-- <td>{!! $departement->etatBadge !!}</td> --}}
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
