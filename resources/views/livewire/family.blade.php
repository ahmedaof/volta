<div class="modal-body">
    {{-- success message --}}
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    {{-- button create --}}

    <button wire:click="create" class="btn btn-primary float-right mt-3 mb-3">Create New Family</button>

    {{-- search field --}}




    <div class="form-group">
        <label for="search">Search</label>
        <input wire:model="search" type="text" class="form-control" id="search" placeholder="Search">
    </div>
    {{-- show pannels in table --}}




    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>name</th>
                <th>discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($families as $family)
            <tr>
                <td>{{ $family->name }}</td>
                <td>{{ $family->discount ?? 0 }}</td>
                <td>

                    <button wire:click="edit({{ $family->id }})" class="btn btn-info btn-sm">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>






    @include('livewire.families.edit')
    @include('livewire.families.create')






</div>
