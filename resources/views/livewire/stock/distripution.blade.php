<div>
    {{-- session show error --}}
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    {{-- session show success --}}
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{--  show flash message --}}
    
    
    {{-- button to import excell with input type file --}}
    <div class="flex justify-center row">
        <div class="col-md-1 mt-5 mb-5">
            <button wire:click="export" class="btn btn-primary">Export</button>
        </div>
        <div class="col-md-1 mt-5 mb-5">
            <button wire:click="import" class="btn btn-primary">Import</button>
        </div>
        <div class="col-md-8 mt-5 mb-5">
            <input type="file" wire:model="file">
        </div>

     
        {{-- create --}}
        <div class="col-md-1 mt-5 mb-5">
            <button wire:click="createShowModal()" class="btn btn-info">Create</button>
        </div>

    </div>

    @include('livewire.stock.create')
    @include('livewire.stock.edit')
    

    {{-- export --}}



    {{-- search products --}}

    <div class="flex justify-center row">
        <div class="col-md-4 mt-5 mb-5">
            <input type="text" wire:model="search" class="form-control" placeholder="Search Products by ID OR description  or Quantity...">
        </div>
    </div>
    {{-- table to show data from excell --}}
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>ABB ID</th>
                <th>ADD Description</th>
                <th>Family</th>
                <th>available quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>action</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($products as $distribution)
            <tr>

        <td>{{ $distribution->abb_id }}</td>
        <td>{{ $distribution->abb_description }}</td>
        <td>{{ $distribution->family?->name ?? 'NA'}}</td>
        <td>{{ $distribution->quantity }}</td>
        <td>{{ $distribution->abb_price }}</td>
        <td>{{ $distribution->abb_discount ?? 0}}</td>
        <td>
            <button wire:click="edit({{ $distribution->id }})" class="btn btn-primary btn-sm">Edit</button>
            <button wire:click="delete({{ $distribution->id }})" class="btn btn-danger btn-sm">Delete</button>
        </td>
 
        </tr>
        @endforeach
        </tbody>
    </table>
    {{-- pagination --}}
    <div class="row">
        <div class="col-md-12">
            {{ $products->links() }}
        </div>
    </div>

    <style>
        body > div > div.content-wrapper > div > div > div > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between{
            margin-top: 20px;
        }
        body > div > div.content-wrapper > div > div > div > div:nth-child(3) > div > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(2) > span > a.relative.inline-flex.items-center.px-2.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-r-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150 > svg{
            width: 26px;
        }
        body > div > div.content-wrapper > div > div > div > div:nth-child(3) > div > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(2) > span > a.relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150 > svg{
            width: 26px;
        }
        body > div > div.content-wrapper > div > div > div > div:nth-child(3) > div > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(1) > p{
            margin:20px
        }

        svg{
            width: 20px;
        }
    </style>
</div>
