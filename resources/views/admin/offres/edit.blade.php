@extends('layouts.admin')
@section('title','Mise à jour offre #' . $offre->id)

@section('content')
    @section('actions')
        <a href="{{ route('admin.offres.index') }}" class="btn btn-light rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
    @endsection


    <div class="col-md-12">
        <div class="card mb-4 shadow-none">
            <div class="card-body">
                {!! Form::model($offre, ['method' => 'PUT', 'route' => ['admin.offres.update', ['offre' => $offre->id]]]) !!}

                    @include('admin.recruteurs.offres._fields', ['includeEntreprises' => true])

                    <div class="text-right">
                        <hr>
                        <button class="btn btn-secondary">Mettre à jour</button>
                    </div>
               {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
