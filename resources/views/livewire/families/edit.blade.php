<div class="modal fade show @if ($editMode) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog" id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Save </h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">

                {{-- name --}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input wire:model.lazy="name" type="text" class="form-control" placeholder="Enter name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Quantity --}}

                <div class="form-group col-md-6">
                    <label for="quantity">discount</label>
                    <input wire:model.lazy="discount" type="number" class="form-control" placeholder="Enter discount">
                    @error('discount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button wire:click="update" class="btn btn-primary">
                        Update
                    </button>
                    <button wire:click="closemodal" class="btn btn-warning">
                        <span class='fa fa-remove'></span> Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
