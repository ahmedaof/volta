<div class="modal fade show @if ($createModal) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog" id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Save </h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">



                <div class="form-group">
                    <label for="type">type</label>
                    <input wire:model="type" type="text" class="form-control" id="type" placeholder="Enter type">

                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="IP">IP</label>
                    <input wire:model="ip" type="text" class="form-control" id="IP" placeholder="Enter IP Number">

                    @error('IP') <span class="text-danger">{{ $message }}</span> @enderror

                </div>

                {{-- thickness --}}
                <div class="form-group">

                    <label for="thickness">thickness</label>
                    <input wire:model="thickness" type="text" class="form-control" id="thickness" placeholder="Enter thickness">

                    @error('thickness') <span class="text-danger">{{ $message }}</span> @enderror

                </div>

                {{-- Mounting --}}

                <div class="form-group">

                    <label for="Mounting">Mounting</label>
                    <input wire:model="Mounting" type="text" class="form-control" id="Mounting" placeholder="Enter Mounting">

                    @error('Mounting') <span class="text-danger">{{ $message }}</span> @enderror

                </div>


                <div class="modal-footer">
                    <button wire:click="saveType" class="btn btn-primary">
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
