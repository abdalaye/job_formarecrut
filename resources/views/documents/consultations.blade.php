
@extends('layouts.admin')

@section('title','Documents - Consultations')
@section('content')
    @foreach ($type_documents as $item)
        <div class="col-md-3 col-xs-6 mb-2">
            <a href="{{ route('documents.liste', $item->id) }}">
                <div class="card rounded block shadow-none border-0 text-center ">
                    <div class="card-body mt-4 mb-4">

                        <span class="numberInPanel text">
                            {{ $item->name }}
                        </span><br>
                        <span class="badge badge-info text-center">{{ count($item->documents )}}</span>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endsection
@section('scriptBottom')

@endsection
