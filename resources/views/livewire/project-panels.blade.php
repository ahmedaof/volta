<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Panel Type</th>
                <th>Panel Name</th>
                <th>Quantity</th>
                <th>ِAmper</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($panels as $panel)
            <tr>
                <td>{{ $panel->panelType->type }}</td>
                <td>{{ $panel->panel_name }}</td>
                <td>{{ $panel->panel_quantity }}</td>
                <td>{{ $panel->panel_volte }}</td>
                
                <td>
                    <button wire:click="edit({{ $panel->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $panel->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    
        <script>
            window.addEventListener('swalDelete', function(e) {
                Swal.fire({
                    title: 'Are you sure?'
                    , text: "You won't be able to revert this!"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        livewire.emit('deleteAfter')
                    }
                })
            });
            // sucess
            window.addEventListener('success', function(e) {
                Swal.fire(
     
                    'Deleted Successfully'
                )
            });
    
        </script>
</div>