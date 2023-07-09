<div>
    {{-- href to create project --}}
{{-- message session --}}
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
    {{-- button create project --}}

    <a href="{{ route('projects') }}" class="btn btn-info float-right mt-3 mb-3">Create New Project</a>
   
    {{-- button showcustomers --}}
    {{-- show projects table --}}

    {{-- search --}}
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Project Name</th>
                {{-- offer_number --}}
                <th scope="col">Offer Number</th>
                {{-- type --}}
                <th scope="col">Project type</th>
                <th scope="col">Project Note</th>
                <th scope="col">Project Status</th>
                <th scope="col">Customer</th>
                <th scope="col">Project Created</th>
                <th scope="col">Project Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project?->name }}</td>
                    <td>{{ 'TECH :(' . $project?->offer_number . ')' }} {!!   $project->offer_fin ?  '<br>' . 'COM : ( ' . $project->offer_fin . ')' : ''  !!}</td>
                    <td>{{ $project?->type }}</td>
                    <td>{{ $project?->notes }}</td>

                    <td>{{ $project?->status }}</td>
                    <td>{{ $project?->customer?->name }}</td>
                    <td>{{ $project?->created_at }}</td>
                    <td>{{ $project?->updated_at }}</td>
                    <td>
                        <button wire:click="delete({{ $project?->id }})" class="btn btn-sm btn-danger">Delete</button>
                        {{-- a href to show --}}
                        <a href="{{ route('projects.show', $project?->id) }}" class="btn btn-sm btn-success">Edit Details</a>

                        {{-- download Technical offer --}}
                        <button wire:click="download({{ $project?->id }})" class="btn btn-sm btn-info">Technical</button>
                        {{-- download finantial offer --}}
                        <button wire:click="downloadFinantial({{ $project?->id }})" class="btn btn-sm btn-primary">Commercial</button>
                        {{-- download finantial offer --}}

                        {{-- a href to all details --}}

                        @if($project->type == 'Panels')
                            
                        <a href="{{ route('projectDetails', $project?->id) }}" class="btn btn-sm btn-warning">Details</a>
                        @endif

                        {{-- factory button --}}
                        

                        @if($project?->status == 'pending')

                        <button wire:click="factory({{ $project?->id }})" class="btn btn-sm btn-dark">Factory</button>

                        @endif
                        
                    </td>
                </tr>
            @endforeach
        </tbody>


        <script>
            window.addEventListener('swalDelete', function(e) {
                Swal.fire({
                    title: 'Are you sure?'
                    , text: e.detail.name == 'delete' ? 'Delete It' : e.detail.name ==  'factory' ? 'Factory It'   :"This Will Be Converted To Factory and quntity not enough for ! "+e.detail.name
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: e.detail.name == 'delete' ? ' Yes , delete It':'Yes, convert it!'
                }).then((result) => {
                    if (result.value) {
                        if (e.detail.name == 'delete') {
                            Livewire.emit('deleteProject')
                        } else if (e.detail.name == 'factory') {
                            Livewire.emit('factoryProject')
                        }
                        else {
                            livewire.emit('deleteAfter')
                            // Livewire.emit('factory')
                        }
                    }
                })
            });

                 // sucess
        window.addEventListener('success', function(e) {
            Swal.fire(
                'The Status?'
                , 'Updated Successfully'
            )
        });
    
        </script>
    
    @include('livewire.main-projects.choose')
</div>
