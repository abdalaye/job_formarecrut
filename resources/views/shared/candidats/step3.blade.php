@section('title', 'Candidats - Expériences')

@section('actions')
    <button type="button" data-toggle="modal" data-target="#addExperience" class="btn btn-primary">Ajouter une nouvelle expérience</button>
    @include('admin.candidats.experiences.create')
@endsection


{{-- table header --}}
@section('tableHeader')
<tr>
    <td>N°</td>
    <td>Poste</td>
    <td>Employeur</td>
    <td>Pays</td>
    <td>Ville</td>
    <td>Date de début</td>
    <td>Date de fin</td>
    <td class="text-center">Actions</td>
</tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
@forelse($candidat->experiences()->get() as $experience)
<tr>
    <td>#{{ $loop->index+1 }}</td>
    <td>{{ $experience->poste }}</td>
    <td>{{ $experience->employeur }}</td>
    <td>{{ $experience->country->name }}</td>
    <td>{{ $experience->city->name }}</td>
    <td>{{ $experience->date_debut }}</td>
    <td>{{ $experience->date_fin }}</td>
    <td class="text-center">
        <a href="#" data-toggle="modal" data-target="#showExperience{{ $experience->id }}" class="btn btn-light btn-xs"><i class="fa fa-eye"></i></a>
        <a href="#" data-toggle="modal" data-target="#editExperience{{ $experience->id }}" class="btn btn-light btn-xs"><i class="fa fa-edit"></i></a>

        <x-form-link 
            onclick="return confirm('Êtes vous sûr.e ?')" 
            method="DELETE" 
            url="{{ route('admin.candidats.experiences.destroy', ['candidat' => $candidat->id, 'experience' => $experience->id]) }}" 
            class="btn btn-light text-danger btn-xs"
        >
            <i class="fa fa-trash"></i>
        </x-form-link>

        @include('admin.candidats.experiences.edit')

        @include('admin.candidats.experiences.show')

    </td>
</tr>
@empty 
<tr>
    <td class="text-center" colspan="8">Aucune expérience professionnelle n'a été ajoutée pour le moment...</td>
</tr>
@endforelse
@endsection


@if($candidat->experiences()->count())
@section('cardFooter')
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => 4, 'hash' => sha1($candidat->id)]) }}" class="btn btn-outline-secondary ml-2">Suivant <i class="fas fa-arrow-circle-right ml-2"></i></a>
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
