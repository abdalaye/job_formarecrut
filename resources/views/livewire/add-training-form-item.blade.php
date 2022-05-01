<div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="formation">Formation</label>
                <input type="text" wire:model="item.formation" id="formation" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Etablissement</label>
                <input type="text" wire:model="item.etablissement" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Ville</label>
                <input type="text" class="form-control" wire:model="item.ville">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_at">Date de début</label>
                        <select name="start_at" id="start_at" class="form-control custom-select">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_at">&nbsp;</label>
                        <select name="start_at" id="start_at" class="form-control custom-select">
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_at">Date de fin</label>
                        <select name="start_at" id="start_at" class="form-control custom-select">

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_at" class="d-flex justify-content-between">&nbsp; <label style="display: inline-flex;align-items:center; gap: 10px;margin: 0;padding: 0"><input type="checkbox">Présent</label></label>
                        <select name="start_at" id="start_at" class="form-control custom-select">
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>