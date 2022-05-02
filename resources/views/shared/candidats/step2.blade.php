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
    <td>Ville</td>
    <td>Date de début</td>
    <td>Date de fin</td>
    <td class="text-center">Actions</td>
</tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
@foreach($candidat->formations()->get() as $formation)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $formation->formation }}</td>
    <td>{{ $formation->etablissement }}</td>
    <td>{{ $formation->ville }}</td>
    <td>{{ $formation->date_debut }}</td>
    <td>{{ $formation->date_fin }}</td>
    <td class="text-center">
        <a href="" class="btn btn-light btn-xs"><i class="fa fa-eye"></i></a>

        <x-form-link 
            onclick="return confirm('Êtes vous sûr.e ?')" 
            method="DELETE" 
            url="{{ route('admin.candidats.formations.destroy', ['candidat' => $candidat->id, 'training' => $formation->id]) }}" 
            class="btn btn-light text-danger btn-xs"
        >
            <i class="fa fa-trash"></i>
        </x-form-link>
    </td>
</tr>
@endforeach
@endsection

{{-- Datatable extension --}}
@include('layouts.sub_layouts.datatable')


@section('scriptBottom')
    @include('partials.utilities.datatableElement', ['id' => 'datatable'])
@endsection
