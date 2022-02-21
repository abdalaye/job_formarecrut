@extends('layouts.admin')

@section('title', 'Visualisation type de document')

@section('actions')
    <div class="actions dropdown-menu-right action-btn">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
            <i class="fas fa-chevron-left"></i> Retour
        </a>
    </div>
@endsection


@section('content')
    <div class="col-md-12 pt-2">
        <div class="card rounded shadow-none border-0">
            <div class="card-body">
                @include("documents.fiche")
            </div>
        </div>
        <div class="col-12">
            <h3 class="text-dark">Traitement du document</h3>
        </div>
        @include('partials.element.consultation_jalons',['jalons'=>$document->jalons])

    </div>
@endsection


@section('scriptBottom')
    <script>
        $(function() {
            $('body').on('click','.jalonDescription',function() {
                //alert('bonjour');
                $('#descrip_traitement').val($(this).data('descrip_jalon'));
                $('#collab').text($(this).data('colab'));
                $('#lib').text($(this).data('lib'));
                $('#date').text($(this).data('date'));
            });
        });
    </script>
@endsection
