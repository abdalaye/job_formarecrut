@section('title', 'Candidats - Expériences professionnelles')

@section('actions')
    <div>
        <a href="javascript:history.back();" class="btn btn-light btn-sm rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
        @include('admin.candidats.competences.create', ['competence' => new \App\Models\Competence])
    </div>
@endsection



<div class="col-12">
    <div class="card shadow-none text-right">
        <div class="card-body">
            <button type="button" data-toggle="modal" data-target="#addCompetence" class="btn btn-primary btn-sm rounded small">Ajouter une compétence</button>
        </div>
    </div>
</div>

{{-- table header --}}
@section('tableHeader')
<tr>
    <td>N°</td>
    <td>Compétence</td>
    <td>Niveau</td>
    <td class="text-center">Actions</td>
</tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
@forelse($candidat->competences()->orderBy('name')->get() as $competence)
<tr>
    <td>#{{ $loop->index+1 }}</td>
    <td>{{ $competence->name }}</td>
    <td>{{ $competence->niveau_competence->name ?? '---' }}</td>
    <td class="text-center">
        <a href="#" data-toggle="modal" data-target="#showCompetence{{ $competence->id }}" class="btn btn-light btn-xs"><i class="fa fa-eye"></i></a>
        <a href="#" data-toggle="modal" data-target="#editCompetence{{ $competence->id }}" class="btn btn-light btn-xs"><i class="fa fa-edit"></i></a>

        <x-form-link 
            onclick="return confirm('Êtes vous sûr.e ?')" 
            method="DELETE" 
            url="{{ route('admin.candidats.competences.destroy', ['candidat' => $candidat->id, 'competence' => $competence->id]) }}" 
            class="btn btn-light text-danger btn-xs"
        >
            <i class="fa fa-trash"></i>
        </x-form-link>

        @include('admin.candidats.competences.edit')

        @include('admin.candidats.competences.show')

    </td>
</tr>
@empty 
<tr>
    <td class="text-center" colspan="8">Aucune expérience professionnelle n'a été ajoutée pour le moment...</td>
</tr>
@endforelse
@endsection


@if($candidat->competences()->count())
@section('cardFooter')
<div class="d-flex justify-content-end">
    <a href="{{ route('admin.candidats.edit', ['candidat' => $candidat->id, 'step' => $step+1, 'hash' => sha1($candidat->id)]) }}" class="btn btn-outline-secondary ml-2">Suivant <i class="fas fa-arrow-circle-right ml-2"></i></a>
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
