<div class="modal fade show @if ($tabModel) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog" id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Save </h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">



                {{-- select tabs --}}
                <select wire:model="tab" class="form-control select2-blue" id="tabModel">
                    <option value="">Select tab</option>
                    @foreach($tabs as $tab)
                    <option value="{{ $tab }}">{{ $tab }}</option>
                    @endforeach
                </select>


                @if(isset($details) && !$details)
                 
              
                <div class="row">
                    <div class="form-group col-md-6" wire:ignore>

                        <label for="product">Select Product</label>
                        <select label="Choose product" id="selectProduct.{{ $i }}" class="js-example-basic-single{{ $i }} form-control">
                            <option value="">Select product</option>
                            @foreach($products as $product)
                            <option i="{{ $product->id }}" {{ $product->id == $product_Id ? 'selected' : '' }}>{{ $product->abb_description }}</option>
                            @endforeach
                        </select>
                        @error("product_Id.$i")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantity">Quantity</label>
                        <input wire:model.lazy="quantity.1" type="number" class="form-control" placeholder="Enter quantity">
                        @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
                <div class="Added mt-3" >
                    @foreach($inputs as $key => $value)
                    @include('livewire.projects.record' ,['key'=>$key , 'value'=>$value , 'i' => $i])
                    @endforeach
                </div>
                {{-- button to add new row --}}
                <button wire:click.defer="addRow({{$i}})" class="btn btn-primary mt-3 mb-3">Add New Product</button>


                <div class="modal-footer">
                    <button wire:click="saveTab" class="btn btn-primary">
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
