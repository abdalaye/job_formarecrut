
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
            <td>Etat</td>
            <td>Logo</td>
            <td>Actions</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @foreach ($recruiters as $recruiter)
        <tr>
            <td>{{ $loop->index + 1 }} </td>
            <td>{{ $recruiter->nom ?? '---' }}</td>
            <td>{{ $recruiter->adresse ?? '---' }}</td>
            <td>{{ $recruiter->n_employers }}</td>
            <td>{{ $recruiter->phone ?? '---' }}</td>
            <td>{{ $recruiter->status_badge }}</td>
            <td>{{ $recruiter->logoUrl(['size' => 50]) }}</td>
            <td>
                <a href="{{ route('admin.active_recruiters.show', $recruiter->id) }}" id="{{ $recruiter->id }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-eye"></i>
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
