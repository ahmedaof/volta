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
             

            {{-- fileds to register new user --}}

            <div class="form-group">
                <label for="name">Name</label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Enter Name">

                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Enter Email">

                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>

                {{-- select role --}}
                <select wire:model="role" class="form-control" id="role">
                    <option value="">Select Role</option>
                   @foreach ($roles as $role)
                       <option value="{{ $role }}">{{ $role }}</option>
                   @endforeach
                </select>

                @error('role') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="Enter Phone">

                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input wire:model="password" type="password" class="form-control" id="password" placeholder="Enter Password">

                @error('password') <span class="text-danger">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input wire:model="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Enter Password Confirmation">

                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror

            </div>


        

                  <div class="modal-footer">
                      <button wire:click="saveUser"class="btn btn-primary">
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