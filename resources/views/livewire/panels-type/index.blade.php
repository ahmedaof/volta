<div>
    {{-- button to add type --}}

    {{-- session show error --}}
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    {{-- session show success --}}
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button wire:click="create()" class="btn btn-info mt-3 mb-3 float-right">Add New type</button>

    @include('livewire.panels-type.create')
    @include('livewire.panels-type.edit')

    {{-- search input--}}




    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- type --}}
                <th>Id</th>
                <th>type</th>
                <th>Ip</th>
                <th>Thickness</th>
                <th>Mounting</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->type }}</td>
                <td>{{ $type->ip }}</td>
                <td>{{ $type->thickness }}</td>
                <td>{{ $type->Mounting }}</td>
                <td>
                    <button wire:click="edit({{ $type->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $type->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <style>
            body>div>div.content-wrapper>div>div>div>nav>div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
                margin-top: 20px;
            }

            body>div>div.content-wrapper>div>div>div>div:nth-child(3)>div>nav>div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between>div:nth-child(2)>span>a.relative.inline-flex.items-center.px-2.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-r-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150>svg {
                width: 26px;
            }

            body>div>div.content-wrapper>div>div>div>div:nth-child(3)>div>nav>div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between>div:nth-child(2)>span>a.relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150>svg {
                width: 26px;
            }

            body>div>div.content-wrapper>div>div>div>div:nth-child(3)>div>nav>div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between>div:nth-child(1)>p {
                margin: 20px
            }

            svg {
                width: 20px;
            }

        </style>
</div>
