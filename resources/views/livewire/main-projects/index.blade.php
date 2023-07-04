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
                    <td>{{ $project?->offer_number }}</td>
                    <td>{{ $project?->type }}</td>
                    <td>{{ $project?->notes }}</td>

                    <td>{{ $project?->status }}</td>
                    <td>{{ $project?->customer?->name }}</td>
                    <td>{{ $project?->created_at }}</td>
                    <td>{{ $project?->updated_at }}</td>
                    <td>
                        <button wire:click="delete({{ $project?->id }})" class="btn btn-sm btn-danger">Delete</button>
                        {{-- a href to show --}}
                        <a href="{{ route('projects.show', $project?->id) }}" class="btn btn-sm btn-success">Show</a>

                        {{-- download Technical offer --}}
                        <button wire:click="download({{ $project?->id }})" class="btn btn-sm btn-info">Technical</button>
                        {{-- download finantial offer --}}
                        <button wire:click="downloadFinantial({{ $project?->id }})" class="btn btn-sm btn-dark">commercial</button>
                        {{-- download finantial offer --}}
                        

                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    
</div>
