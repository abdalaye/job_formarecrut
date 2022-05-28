
@extends('layouts.admin')

@section('title', $title ?? "Liste des offres")

@section('content')

    @section('actions')
    <a href="{{ route('admin.offres.create') }}" class="btn btn-primary text-white rounded">Ajouter une offre</a>
    @endsection

    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td style="min-width:100px !important">Titre</td>
            <td>Entreprise</td>
            <td>Secteur</td>
            <td>Date expiration</td>
            <td>Actions</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @foreach ($offres as $offre)
        <tr>
            <td>{{ $loop->index + 1 }} </td>
            <td>{{ $offre->titre ?? '---' }}</td>
            <td>{{ $offre->entreprise->nom }}</td>
            <td>{{ $offre->secteur->name ?? '---' }}</td>
            <td>{{ to_french_date($offre->expires_at) }}</td>
            <td>
                <a href="{{ route('admin.offres.show', $offre->id) }}" id="{{ $offre->id }}" class="btn btn-light btn-xs user">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('admin.offres.edit', $offre->id) }}" id="{{ $offre->id }}" class="btn btn-light btn-xs user">
                    <i class="fa fa-edit"></i>
                </a>

                @include('partials.components.deleteBtnElement', [
                    'btnInnerHTML' => '<i class="fa fa-trash"></i>',
                    'class' => 'btn btn-light btn-xs user',
                    'url' => route('admin.offres.destroy', $offre),
                    'entity' => $offre
                ])
            </td>
        </tr>
        @endforeach
    @endsection

    {{-- Datatable extension --}}
    @include('layouts.sub_layouts.datatable')

@endsection

@section('scriptBottom')
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection
