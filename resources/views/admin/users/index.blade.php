
@extends('layouts.admin')

@section('title','Collaborateurs')

@section('content')
    <!-- Dropdown - User Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td style="width:100px !important">Prénom</td>
            <td>Nom</td>
            <td>Email</td>
            <td >Profil</td>
            <td>Visualiser</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{ $i }} </td>
            <td>{{  $user->collaborateur->prenom ?? '---' }}</td>
            <td>{{  $user->collaborateur->nom ?? '---' }}</td>
            <td>{{ $user->email }}</td>
            <td>{{  $user->profil_name ?? '---' }}</td>
            <td>
                <a href="{{ route('admin.showUser', $user->id) }}" id="{{ $user->id }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-eye"></i>
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
    @include('partials.utilities.datatableElementUser', ['id' => 'datatable'])
@endsection