<div>
    {{-- button to add customer --}}

    {{-- session show error --}}
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    {{-- session show success --}}
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button wire:click="create()" class="btn btn-info mt-3 mb-3 float-right">Add New customer</button>

    @include('livewire.customers.create')
    @include('livewire.customers.edit')

    {{-- search input--}}
    <div class="form-group">
        <input wire:model="search" type="text" class="form-control" placeholder="Search customer...">
    </div>



    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- customer --}}
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Vat Number</th>
                <th>Company Name</th>


            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->vat_number }}</td>
                <td>{{ $customer->company_name }}</td>

                <td>
                    <button wire:click="edit({{ $customer->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $customer->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>

        <div class="row">
            <div class="col-md-12">
                {{ $customers->links() }}
            </div>
        </div>

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
