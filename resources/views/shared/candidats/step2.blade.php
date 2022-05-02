@section('title', 'Candidats - Formations')

@section('actions')
    <button type="button" data-toggle="modal" data-target="#addFormation" class="btn btn-primary">Ajouter une nouvelle formation</button>
    @include('admin.candidats.formations.create')
@endsection


{{-- table header --}}
@section('tableHeader')
<tr>
    <td>N°</td>
    <td>Formation</td>
    <td>Établissement</td>
    <td>Pays</td>
    <td>Ville</td>
    <td>Date de début</td>
    <td>Date de fin</td>
    <td class="text-center">Actions</td>
</tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
@forelse($candidat->formations()->get() as $formation)
<tr>
    <td>#{{ $loop->index+1 }}</td>
    <td>{{ $formation->titre }}</td>
    <td>{{ $formation->etablissement }}</td>
    <td>{{ $formation->country->name }}</td>
    <td>{{ $formation->city->name }}</td>
    <td>{{ $formation->date_debut }}</td>
    <td>{{ $formation->date_fin }}</td>
    <td class="text-center">
        <a href="#" data-toggle="modal" data-target="#showFormation{{ $formation->id }}" class="btn btn-light btn-xs"><i class="fa fa-eye"></i></a>
        <a href="#" data-toggle="modal" data-target="#editFormation{{ $formation->id }}" class="btn btn-light btn-xs"><i class="fa fa-edit"></i></a>

        <x-form-link 
            onclick="return confirm('Êtes vous sûr.e ?')" 
            method="DELETE" 
            url="{{ route('admin.candidats.formations.destroy', ['candidat' => $candidat->id, 'formation' => $formation->id]) }}" 
            class="btn btn-light text-danger btn-xs"
        >
            <i class="fa fa-trash"></i>
        </x-form-link>

        @include('admin.candidats.formations.edit')

        @include('admin.candidats.formations.show')

    </td>
</tr>
@empty
<tr>
    <td class="text-center" colspan="8">Aucune formation n'a été ajoutée pour le moment...</td>
</tr>
@endforelse 
@endsection

@if($candidat->formations()->count())
    @section('cardFooter')
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 3, 'hash' => sha1($candidat->id)]) }}" class="btn btn-outline-secondary ml-2">Suivant <i class="fas fa-arrow-circle-right ml-2"></i></a>
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
