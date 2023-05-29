<div>
    {{-- button to add user --}}
    <button wire:click="create()" class="btn btn-info mt-3 mb-3 float-right">Add New User</button>

    @include('livewire.users.create')
    @include('livewire.users.edit')

    {{-- search input--}}
    <div class="form-group">
        <input wire:model="search" type="text" class="form-control" placeholder="Search User...">
    </div>



    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
                <th>role</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <button wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
</div>
