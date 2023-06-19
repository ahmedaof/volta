<div
class="modal fade show @if ($updateModal) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
  <div class="modal-dialog"  id="innerboxdel">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"> Save </h4>
              <button wire:click="closemodal"
               type="button" class="close" >&times;</button>
          </div>
          <div class="modal-body">
             

            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input wire:model="company_name" type="text" class="form-control" id="company_name" placeholder="Enter Company Name">

                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror

            </div>


            <div class="form-group">
                <label for="vat">VAT</label>
                <input wire:model="vat_number" type="text" class="form-control" id="vat" placeholder="Enter VAT Number">

                @error('vat_number') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            {{-- company_name --}}

        


            <div class="form-group">
                <label for="name">Name</label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Enter Name">

                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="Enter Phone">

                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

        

                  <div class="modal-footer">
                      <button wire:click="EditCustomer"class="btn btn-primary">
                           Update
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