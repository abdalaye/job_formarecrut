@if (isset($donnees) && count($donnees))
    <hr>
    <h4 class="small text-secondary font-weight-bolder text-uppercase">{{ __('Ordonner les éléments') }}</h4>
    <form action="{{ route('admin.range.elements', $entityModel) }}" method="POST" id="collapseRanger">
        @csrf
        <div id="form_ranger" class="p-1">
            <!-- Simple List -->
            <div id="simpleList" class="list-group">
                @foreach ($donnees as $etudeRange)
                    <div class="list-group-item justify-content-start py-1" style="cursor: grabbing;"
                        data-id="{{ $etudeRange->id }}" id="elt{{ $loop->index }}">
                        <i class="fas fa-sort px-2"></i>
                        {{ $etudeRange->rang }}.
                        {{ $etudeRange->name }}
                        <input type="hidden" name="champs[{{ $etudeRange->id }}]" id="champs{{ $etudeRange->id }}"
                            value="{{ $loop->index }}">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer text-right p-1">
            <button type="submit" class="btn btn-success btn-rounded">{{ __('Ranger les éléments') }}</button>
        </div>
    </form>
@endif

@push('scripts')
<script src="{{ asset('js/vendor/sortable.min.js') }}"></script>
<script src="{{ asset('js/sort_item.js') }}"></script>
@endpush
