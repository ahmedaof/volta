<div class="modal fade show @if ($addModel) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog" id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Save </h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">
                {{-- select tabs --}}

                <div class="form-group col-md-12">

                    <label for="panel_type">Panel Type</label>
                    <select wire:model.lazy="panel_type" class="form-control select2-blue" id="panel_type">
                        <option value="">Select panel type</option>
                        @foreach($panel_Types as $panelType)
                        <option value="{{ $panelType->id }}">{{ $panelType->type }}</option>
                        @endforeach
                    </select>
                    @error('panel_type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
        
                </div>

                <div class="form-group col-md-12">
                    <label for="panel_name">Panel Name</label>
                    <input wire:model.lazy="panel_name" type="text" class="form-control" id="panel_name" placeholder="Enter panel name">
                    @error('panel_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                {{-- quantity --}}
                <div class="form-group col-md-12">
                    <label for="panel_quantity">Quantity</label>
                    <input wire:model.lazy="panel_quantity" type="number" class="form-control" id="panel_quantity" placeholder="Enter quantity">
                    @error('panel_quantity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                {{-- volte --}}
        
                <div class="form-group col-md-12">
                    <label for="panel_volte">Amper</label>
                    <input wire:model.lazy="panel_volte" type="number" class="form-control" id="panel_volte" placeholder="Enter Amper">
                    @error('panel_volte')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              

                <div class="modal-footer">
                    <button wire:click="AddPanel" class="btn btn-primary">
                        Save
                    </button>
                    <button wire:click="closemodal" class="btn btn-warning">
                        <span class='fa fa-remove'></span> Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
