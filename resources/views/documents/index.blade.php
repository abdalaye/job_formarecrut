
@extends('layouts.admin')

@section('title', $title ?? 'Documents - liste')

@section('content')
    <!-- Dropdown - User Information -->
    @section('tableHeader')
        <tr>
            <td>N°</td>
            <td>Reférence</td>
            <td>Objet</td>
            <td>Date soumission</td>
            <td>Actions</td>
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
            <td>{{ $document->date_publication ?? "---" }}</td>
            <td>
                <a href="{{ route('mesdocuments.show', $document->ref) }}" class="btn btn-primary btn-sm user">
                    <i class="fa fa-eye"></i>
                </a>
                @if ($document->statut_document_id == 1)
                    <a href="{{ route('documents.edit', $document->ref) }}" class="btn btn-primary btn-sm user">
                        <i class="fa fa-edit"></i>
                    </a>
                @endif
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