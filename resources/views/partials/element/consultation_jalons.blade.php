
@section('cardHeader')
    <div class="col-12">
        <div class="form-group my-0">
            <label class="text-primary">Jalons de traitement</label>
        </div>
    </div>
@endsection
@section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Libellé</td>
        <td>Collaborateur</td>
        <td>Date</td>
        <td>Déscription</td>
        <td>Actions</td>
    </tr>
@endsection
@section('tableBody')
    @php $i = 1 @endphp
    @foreach ($jalons as $j=> $jalon)
        <tr>
            <td>{{  $j+1  }}</td>
            <td>{{  $jalon->action  }}</td>
            <td>{{  $jalon->collaborateur->prenom.' '.$jalon->collaborateur->nom  }}</td>
            <td>{{   date('d-m-Y', strtotime($jalon->date_creation)) }}</td>
            <td class="d-inline-block text-truncate" style="max-width: 150px;">
                {{ $jalon->description }}
            </td>

            <td>
                <a href="#" class="jalonDescription btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-id="{{ $jalon->id }}"
                    data-colab="{{  $jalon->collaborateur->prenom.' '.$jalon->collaborateur->nom }}"
                    data-lib="{{ $jalon->action }}"
                    data-date="{{ date('d-m-Y', strtotime($jalon->date_creation)) }}"
                    data-descrip_jalon="{{ $jalon->description }}"
                    data-target="#vueJalonModal">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        @php $i++ @endphp
    @endforeach
@endsection

@include('partials.element.viewJalonModal')
@include('layouts.sub_layouts.datatable')

