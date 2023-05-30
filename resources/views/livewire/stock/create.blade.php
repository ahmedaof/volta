<div
class="modal fade show @if ($createModal) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
  <div class="modal-dialog"  id="innerboxdel">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"> Save </h4>
              <button wire:click="closemodal"
               type="button" class="close" >&times;</button>
          </div>
          <div class="modal-body">
             

            {{-- fileds to add products --}}

            <div class="form-group">
                <label for="name">ABB ID</label>
                <input wire:model="abb_id" type="text" class="form-control" id="abb_id" placeholder="Enter ABB ID">
                @error('abb_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="name">ABB Description</label>
                <input wire:model="abb_description" type="text" class="form-control" id="abb_description" placeholder="Enter ABB Description">
                @error('abb_description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="name">Family</label>
                <select wire:model="family_id" class="form-control" id="family_id">
                    <option value="">Select Family</option>
                    @foreach($families as $family)
                    <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </select>
                @error('family_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="name">Quantity</label>
                <input wire:model="quantity" type="text" class="form-control" id="quantity" placeholder="Enter Quantity">
                @error('quantity') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="name">ABB Price</label>
                <input wire:model="price" type="text" class="form-control" id="price" placeholder="Enter ABB Price">
                @error('price') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="name">ABB Discount</label>
                <input wire:model="discount" type="text" class="form-control" id="discount" placeholder="Enter ABB Discount">
                @error('discount') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            {{-- end fileds to add products --}}

         


        

                  <div class="modal-footer">
                      <button wire:click="saveProduct"class="btn btn-primary">
                           Save
                      </button>
                      <button wire:click="closemodal"
                     class="btn btn-warning">
                          <span class='fa fa-remove'></span> Close
                      </button>
                  </div>
           
          </div>
      </div>
  </div>
</div>