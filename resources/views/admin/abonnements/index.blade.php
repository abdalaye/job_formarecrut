@extends('layouts.admin')
@section('title','Liste des plans d\'abonnements')

@section('content')
    @section('actions')
        <a href="{{ route('admin.abonnements.create') }}" class="btn btn-primary text-white rounded">Configurer un nouveau</a>
    @endsection

    {{-- table header --}}
    @section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Nom</td>
        <td>Etat</td>
        <td>Abonnement</td>
        <td>Actions</td>
    </tr>
    @endsection

    {{-- Table Body --}}
    @section('tableBody')
    @php $i = 1 @endphp
        @foreach ($abonnements as $abonnement)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $abonnement->name }}</td>
            <td>{!! $abonnement->statut_badge !!}</td>
            <td>{{ $abonnement->price_texte ?? '---' }}</td>
            <td>
                <a href="{{ route('admin.abonnements.show', $abonnement) }}"
                    class="text-primary"><i class="fas fa-eye"></i></a>

                <a href="{{ route('admin.abonnements.edit', $abonnement) }}"
                    class="text-info"><i class="fas fa-edit"></i></a>

                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.abonnements.destroy',$abonnement->id),
                    'class' => 'text-danger ml-3',
                    'message_confirmation'=>'Voulez-vous supprimer le plan suivant :' .$abonnement->name,
                    'entity'=>$abonnement
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
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
@endsection
