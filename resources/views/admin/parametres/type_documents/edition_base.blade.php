<div class="col-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0 rounded shadow-none border-0 pb-0">
                <div class="card-body pb-0">
                    <form method="POST" action="{{ isset($creation) ? route('admin.typedocuments.store') : route('admin.typedocuments.update', $typedocument) }}" enctype="multipart/form-data">
                        @csrf
                        @if (!isset($creation))
                            @method("PATCH") 
                        @endif
                        <div class="form-group">
                            <label for="name">Nature du document</label>
                            <input type="text" placeholder="ex: facture, contrat, ..." value="{{ $typedocument->name }}" name="name" id="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="authorised_extensions">Formats autorisés</label>
                            @if (isset($_extensions) && count($_extensions))
                                <div class="d-block">
                                    @foreach ($_extensions as $name => $values)
                                        <label for="{{ $name }}" class="p-2 mr-2 border rounded font-weight-normal">
                                            <input type="checkbox" name="authorised_extensions[]" {{ in_array($name, $typedocument->authorised_extensions_array ?? []) ? "checked" : "" }} value="{{ $name }}" id="{{ $name }}">
                                            {{ strtoupper($name) }}
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-md-8">
                                <label for="icon">Icône lié</label>
                                <input type="file" name="icon" id="icon" class="form-control form-control-file border-0 bg-light">
                            </div>
                            <div class="col-md-4 text-right">
                                @if (isset($typedocument->icon))
                                    <img src="{{ asset($typedocument->icon) }}" alt="Icone document" class="img-rounded img-size-64">
                                @else
                                    <i class="fas fa-file-alt fa-5x text-muted"></i>
                                @endif
                            </div>
                        </div> --}}
                        <hr class="mx-auto">
                        <div class="form-group text-right">
                            <button class="btn btn-warning btn-lg shadow-sm rounded">{{ isset($creation) ? "Démarrer" : "Mettre à jour" }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>