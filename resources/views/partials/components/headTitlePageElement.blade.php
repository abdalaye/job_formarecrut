<div class="d-sm-flex align-items-center justify-content-between">
    <h4 class="m-0 text-white-50 font-weight-lighter">@yield('subtitle')</h4>
    @if (isset($url))
        <a href="{{  url($url) }}" class="btn-sm btn-light text-primary">Ajouter <i class="fas fa-plus-circle ml-2"></i></a>
    @endif
    @if(isset($urlback))
        <a href="{{ $urlback != "" ? $urlback : url()->previous() }}" class="btn-sm btn-light text-primary"><i class="fas fa-arrow-left ml-2"></i> Retour</a>
    @endif
    @if(isset($edit))
        <a href="{{ route('admin.postes.edit', $poste->id)  }}" class="btn btn-light btn-sm text-primary">
            <i class="fa fa-edit"></i> Modifier
        </a>
    @endif
    @if(isset($isModal))
        <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exampleModal">
            Ajouter <i class="fas fa-plus-circle ml-2"></i>
        </button>
    @endif
</div>
