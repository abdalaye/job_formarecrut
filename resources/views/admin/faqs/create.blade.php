@extends('layouts.admin')
@section('title','Nouvelle FAQ')

@section('content')
    @section('actions')
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-light rounded"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
    @endsection


    <div class="col-md-12">
        <div class="card mb-4 shadow-none">
            <div class="card-body">
                <form action="{{ route('admin.faqs.store') }}" method="post">
                    @csrf
                    @include('admin.faqs.form')

                    <div class="text-right">
                        <hr>
                        <button class="btn btn-secondary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scriptBottom')
@endsection
