@extends('layouts.admin')

@section('title', 'FAQS')

@section('content')

@section('actions')
<a href="{{ route('admin.faqs.create') }}" class="btn btn-primary text-white rounded">Nouvelle FAQ</a>
@endsection
    <!-- Dropdown - User Information -->
@section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Question</td>
        <td>Réponse</td>
        <td>Statut</td>
        <td>Actions</td>
    </tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
    @php $i = 1 @endphp
    @foreach ($faqs as $faq)
        <tr>
            <td>{{ $i }} </td>
            <td>{{ Str::limit($faq->question ?? '---', 40, '...') }}</td>
            <td>{{ Str::limit($faq->answer_texte ?? '---', 40, '...') }}</td>
            <td>{!! $faq->statut_badge !!}</td>
            <td>
                <a href="{{ route('admin.faqs.show', $faq->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-eye"></i>
                </a>

                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                </a>

                @include('partials.components.deleteBtnElement', [
                    'class' => 'btn btn-primary btn-sm',
                    'entity' => $faq,
                    'url' => route('admin.faqs.destroy', $faq)
                ])

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
