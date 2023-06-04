<div>
    {{-- show projects table --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Project Name</th>
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
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->notes }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->customer->name }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <button wire:click="edit({{ $project->id }})" class="btn btn-sm btn-primary">Edit</button>
                        <button wire:click="delete({{ $project->id }})" class="btn btn-sm btn-danger">Delete</button>
                        {{-- a href to show --}}
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-success">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    
</div>
