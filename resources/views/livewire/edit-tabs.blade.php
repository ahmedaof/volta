<div class="modal fade show @if ($editModel) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog" id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Save </h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">
                {{-- select tabs --}}

                {{-- select tabs --}}
                <select wire:model="tab" class="form-control select2-blue" id="tabModel">
                    <option value="">Select tab</option>
                    @foreach($tabs as $tabV)
                    <option value="{{ $tabV }}" {{ gettype($tab) != 'string' &&  $tabV == $tab?->name ? 'selected' : '' }}>{{ $tabV }}</option>
                    @endforeach
                </select>

                <div class="Added mt-3">
                    @foreach($inputs as $key => $value)
                    @include('livewire.projects.record' ,['key'=>$key , 'value'=>$value , 'i' => $i])
                    @endforeach
                </div>
                {{-- button to add new row --}}
                <button wire:click.defer="addRow({{$i}})" class="btn btn-primary">Add New Product</button>


                <div class="modal-footer">
                    <button wire:click="editTab" class="btn btn-primary">
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
