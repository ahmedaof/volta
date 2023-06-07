<div class="modal-body">

    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

        {{-- show pannels in table --}}

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Panel</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($panel->tabs as $tab)
                <tr>
                    <td>{{ $tab->name }}</td>
                    <td>
                        @foreach($tab->distripution_product as $product)
                        {{ $product->abb_description }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($tab->distripution_product as $product)
                        {{ $product->pivot->quantity }} <br>
                        @endforeach
                    </td>
                    <td>
                        {{-- <button wire:click="edit({{ $panel->id }})" class="btn btn-primary btn-sm">Edit</button> --}}
                        {{-- a href to show  --}}

                        <a href="{{ route('panelStatisics', $tab->id) }}" class="btn btn-primary btn-sm">Show</a>
                    

                        <button wire:click="delete({{ $tab->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>






    {{-- select tabs --}}
    {{-- <select wire:model="tab" class="form-control select2-blue" id="tabModel">
        <option value="">Select tab</option>
        @foreach($tabs as $tab)
        <option value="{{ $tab }}">{{ $tab }}</option>
        @endforeach
    </select>

  

    <div class="row">
        <div class="form-group col-md-6 mr-0" wire:ignore>

            <label for="product">Select Product</label>
            <select label="Choose product" id="selectProduct.{{ $i }}" class="js-example-basic-single{{ $i }} form-control">
                <option value="">Select product</option>
                @foreach($products as $product)
                <option i="{{ $product->id }}" {{ $product->id == $product_Id ? 'selected' : '' }}>{{ $product->abb_description }}</option>
                @endforeach
            </select>
            @error("product_Id.$i")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="quantity">Quantity</label>
            <input wire:model.lazy="quantity.1" type="number" class="form-control" placeholder="Enter quantity">
            @error('quantity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="Added">
        @foreach($inputs as $key => $value)
        @include('livewire.projects.record' ,['key'=>$key , 'value'=>$value , 'i' => $i])
        @endforeach
    </div>
    {{-- button to add new row --}}
    {{-- <button wire:click.defer="addRow({{$i}})" class="btn btn-primary">Add New Product</button>  --}}

    {{-- add tabs button --}}

    @include('livewire.projects.create')

    <div class="row justify-content-end">
        <button wire:click.prevent="addTab" class="btn btn-info">Add Tab one By one</button>
    </div>
    <script>
        $(document).ready(function() {
            window.initSelectProductDrop = () => {
                $('.js-example-basic-single{{ $i }}').select2({
                    placeholder: 'Select a Product'
                    , allowClear: true
                });
            }
            initSelectProductDrop();
            $('.js-example-basic-single{{ $i }}').on('change', function(e) {
                console.log(e.target);
                livewire.emit('selectedProductItem', e.target.value)
            });
            window.livewire.on('select2', () => {
                initSelectProductDrop();
            });

        });

    </script>

    <style>
        body>div>div.content-wrapper>div>div>div>div.Added>div>div.form-group.col-md-6>span>span.selection>span,
        body>div>div.content-wrapper>div>div>div>div.row>div:nth-child(1)>span>span.selection>span ,
        #innerboxdel > div > div.modal-body > div.Added > div > div.form-group.col-md-6 > span > span.selection > span{
            height: 38px !important;
        }

    </style>

</div>
