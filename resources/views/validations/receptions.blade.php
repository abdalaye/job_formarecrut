@extends('layouts.admin')

@section('title',  'Traitement des documents reçus')

@section('content')
    <!-- Dropdown - User Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>Référence</td>
            <td>Objet</td>
            <td>Date de réception</td>
            <td>Action </td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($validations_encours as $validation)
        <tr>
            <td>{{ $i }} </td>
            <td>{{  $validation->document->ref  }}</td>
            <td>{{  $validation->document->name  }}</td>
            <td>{{ $validation->document->date_reception  }}</td>
            <td>
                <a href="{{ route('receptions.transmission', $validation->id) }}" class="btn btn-primary btn-sm user">
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
