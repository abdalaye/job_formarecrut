@extends('layouts.admin')
@section('title',$title)

@section('content')
    @section('actions')
        <a href="{{ route('admin.abonnements.create') }}" class="btn btn-primary btn-sm text-white rounded small">Configurer un nouveau</a>
    @endsection

    {{-- table header --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Prénom</td>
        <td>Nom</td>
        <td>Etat</td>
        <td>Téléphone</td>
        <td>Pays</td>
        <td>Actions</td>
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
    @php $i = 1 @endphp
        @foreach ($candidats as $candidat)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $candidat->prenom }}</td>
            <td>{{ $candidat->nom }}</td>
            <td>{!! $candidat->statut_badge !!}</td>
            <td>{{ $candidat->telephone ?? '---' }}</td>
            <td>{{ $candidat->country->name ?? '---' }}</td>
            <td>
                <a href="{{ route('admin.candidats.show', $candidat) }}" class="btn btn-light btn-xs">
                    <i class="fa fa-eye text-primary"></i>
                </a>
            </td>
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
