
@extends('layouts.admin', ['title' => 'Recruteurs actifs'])

@section('title', 'Recruteurs actifs')

@section('content')
    <!-- Dropdown - User Information -->



    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td style="width:100px !important">Nom</td>
            <td>Adresse</td>
            <td>Nombre d'employés</td>
            <td>Numéro de téléphone</td>
            <td>Logo</td>
            <td>Actions</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @foreach ($recruteurs as $recruteur)
        <tr>
            <td>{{ $loop->index + 1 }} </td>
            <td>{{ $recruteur->nom ?? '---' }}</td>
            <td>{{ $recruteur->adresse ?? '---' }}</td>
            <td>{{ $recruteur->n_employers }}</td>
            <td>{{ $recruteur->phone ?? '---' }}</td>
            <td>{{ $recruteur->logoImg(['size' => '50px']) }}</td>
            <td>
                <a href="{{ route('admin.recruteurs.show', $recruteur->id) }}" id="{{ $recruteur->id }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-eye"></i>
                </a>

                <a href="{{ route('admin.recruteurs.edit', $recruteur->id) }}" id="{{ $recruteur->id }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-edit"></i>
                </a>
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