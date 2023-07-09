<div class="modal fade show @if ($chooseModel) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
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

                    <label for="panel_type">Project Type</label>
                    <select wire:model.lazy="project_type" class="form-control">
                        <option value="">Select Project type</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>
                    @error('project_type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
        
                </div>

               

                <div class="modal-footer">
                    <button wire:click="ChooseProject" class="btn btn-primary">
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
