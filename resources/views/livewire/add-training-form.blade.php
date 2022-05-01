<form action="{{ route('admin.recruteurs.step2', ['entreprise' => $recruteur->id, 'step' => request('step')]) }}">
    @method('put')
    @csrf 

    @foreach($trainingItems as $item)

    <livewire:add-training-form-item :item="$item" />
    

    @if(!$loop->last)
    <hr style="margin: 30px 0;">
    @endif

    @endforeach

    <div class="d-flex align-items-center justify-content-center">
        <button type="button" wire:click="increment" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter une formation</button>
    </div>

</form>