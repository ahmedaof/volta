<div class="modal fade show @if ($editModel) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog" id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Save </h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">


              {{-- project name --}}
                <div class="form-group">
                    <label for="name">Project Name</label>
                    <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter Project Name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- notes --}}
                <div class="form-group">
                    <label for="notes">Project Notes</label>
                    <textarea wire:model="notes" class="form-control" id="notes" placeholder="Enter Project Notes"></textarea>
                    @error('notes') <span class="text-danger">{{ $message }}</span>@enderror

                </div>

                {{-- discount --}}

                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" wire:model="discount" class="form-control" id="discount" placeholder="Enter Discount">
                    @error('discount') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

               

                <div class="modal-footer">
                    <button wire:click="SaveProject" class="btn btn-primary">
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
