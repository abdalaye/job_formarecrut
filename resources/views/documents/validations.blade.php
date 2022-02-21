
@extends('layouts.admin')

@section('title','Documents - Consultations')

@section('content')
    <!-- Dropdown - User Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>Reférence</td>
            <td>Objet</td>
            <td>Date soumission</td>
            <td>valider</td>
        </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
        @php $i = 1 @endphp
        @foreach ($documents as $document)
        <tr>
            <td>{{ $i }} </td>
            <td>{{  $document->ref ?? '---' }}</td>
            <td>{{  $document->name ?? '---' }}</td>
            <td>{{ $document->date_reception ?? "---" }}</td>
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
