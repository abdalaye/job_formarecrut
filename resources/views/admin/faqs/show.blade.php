@extends('layouts.admin')
@section('title', 'Visualisation FAQ #' . $faq->id)

@section('content')

@section('actionItems')
    <a href="{{ route('admin.faqs.edit', $faq) }}" class="dropdown-item">
        <i class="fas fa-edit"></i> Modifier
    </a>
    <a href="{{ route('admin.faqs.index', $faq) }}" class="dropdown-item">
        <i class="fas fa-arrow-circle-left"></i> Retour
    </a>
@endsection
@section('actions')
    @include('partials.components.dropdownElement')

@endsection


<div class="col-md-12">
    <div class="card mb-4 shadow-none">
        <div class="card-body">
            <h4 class="card-title">Informations relatives</h4>
            <div class="form-group rounded mb-2">
                <label class="d-block">Question</label>
                <div class="p-2 bg-light">
                    {{ $faq->question }}
                </div>
            </div>
            <div class="form-group rounded mb-2">
                <label class="d-block">Réponse</label>
                <div class="p-2 bg-light">
                    {!! $faq->answer !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
