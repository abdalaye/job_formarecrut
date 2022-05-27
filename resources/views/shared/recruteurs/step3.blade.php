@section('title', 'recruteurs - mes offres')

@section('actions')
    <div>
        <a href="javascript:history.back();" class="btn btn-light btn-sm rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
    </div>
@endsection


@include('admin.recruteurs.offres.create', ['offre' => new \App\Models\Offre])


@php
dump($errors->all())
@endphp

<div class="col-12">
    <div class="card shadow-none text-right">
        <div class="card-body">
            <button type="button" data-toggle="modal" data-target="#addOffre" class="btn btn-primary btn-sm rounded small">Ajouter une nouvelle offre</button>
        </div>
    </div>
</div>

{{-- table header --}}
@section('tableHeader')
<tr>
    <td>N°</td>
    <td>Titre</td>
    <td>Description</td>
    <td>Date d'expiration</td>
    <td>Secteur d'activité</td>
    <td class="text-center">Actions</td>
</tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
@forelse($recruteur->offres()->get() as $offre)
<tr>
    <td>#{{ $loop->index + 1 }}</td>
    <td>{{ $offre->titre }}</td>
    <td>{{ $offre->description }}</td>
    <td>{{ $offre->expires_at->diffForHumans() }}</td>
    <td>{{ $offre->secteur->name ?? '---' }}</td>
    <td class="text-center">
        <a href="#" data-toggle="modal" data-target="#showOffre{{ $offre->id }}" class="btn btn-light btn-xs"><i class="fa fa-eye"></i></a>
        <a href="#" data-toggle="modal" data-target="#editOffre{{ $offre->id }}" class="btn btn-light btn-xs"><i class="fa fa-edit"></i></a>

        <x-form-link 
            onclick="return confirm('Êtes vous sûr.e ?')" 
            method="DELETE" 
            url="{{ route('admin.recruteurs.offres.destroy', ['entreprise' => $recruteur->id, 'offre' => $offre->id]) }}" 
            class="btn btn-light text-danger btn-xs"
        >
            <i class="fa fa-trash"></i>
        </x-form-link>

        @include('admin.recruteurs.offres.edit')

        @include('admin.recruteurs.offres.show')

    </td>
</tr>
@empty 
<tr>
    <td class="text-center" colspan="8">Aucune offre professionnelle n'a été ajoutée pour le moment...</td>
</tr>
@endforelse
@endsection


@if($recruteur->offres()->count())
@section('cardFooter')
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.recruteurs.edit', ['entreprise' => $recruteur->id, 'step' => 4, 'hash' => sha1($recruteur->id)]) }}" class="btn btn-outline-secondary ml-2">Suivant <i class="fas fa-arrow-circle-right ml-2"></i></a>
</div>
@stop
@endif

{{-- Datatable extension --}}
@include('layouts.sub_layouts.datatable')


@section('scriptBottom')
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
    <script>
        $('.table').removeClass('table-hover');
        $('.table').attr('id', '');
    </script>
@endsection
