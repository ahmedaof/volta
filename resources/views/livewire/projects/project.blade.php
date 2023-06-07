<div>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="form-group">
        <label for="customer">Choose customer</label>
        <select wire:ignore class="js-example-basic-single form-control" id="customer">
            <option value="">Select customer</option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        @error('customer')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    {{-- project name --}}
    <div class="form-group">
        <label for="name">Project name</label>
        <input wire:model.lazy="name" type="text" class="form-control" id="name" placeholder="Enter project name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {{-- notes as text --}}
    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea wire:model.lazy="notes" class="form-control" id="notes" rows="3" placeholder="Enter notes"></textarea>
        @error('notes')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="type">Choose project type</label>
        <select wire:model.lazy="type" class="form-control select2-blue" id="type">
            <option value="">Select type</option>
            @foreach($project_Types as $projectType)
            <option value="{{ $projectType }}">{{ $projectType }}</option>
            @endforeach
        </select>
        @error('type')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    @if($type == 'spare parts')
    {{-- quantity and product name --}}
    <div class="row">
        <div class="form-group col-md-6" wire:ignore>

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
    <button wire:click.defer="addRow({{$i}})" class="btn btn-primary">Add New Product</button>
    {{-- table to show data --}}
    @elseif($type == 'Panels')

    {{-- panel_number --}}

    <div class="form-group">
        <label for="panel_number">Panel Number</label>
        <input wire:model.lazy="panel_number" type="text" class="form-control" id="panel_number" placeholder="Enter panel number">
        @error('panel_number')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    @if($panel_number != null)
    @for($i = 0; $i < $panel_number; $i++) <div class="row">
        <div class="form-group col-md-3">

            <label for="panel_type">Panel Type</label>
            <select wire:model.lazy="panel_type.{{ $i }}" class="form-control select2-blue" id="panel_type">
                <option value="">Select panel type</option>
                @foreach($panel_Types as $panelType)
                <option value="{{ $panelType->id }}">{{ $panelType->type }}</option>
                @endforeach
            </select>
            @error('panel_type')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>


        {{-- panel name --}}
        <div class="form-group col-md-3">
            <label for="panel_name">Panel Name</label>
            <input wire:model.lazy="panel_name.{{ $i }}" type="text" class="form-control" id="panel_name" placeholder="Enter panel name">
            @error('panel_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- quantity --}}
        <div class="form-group col-md-3">
            <label for="panel_quantity">Quantity</label>
            <input wire:model.lazy="panel_quantity.{{ $i }}" type="number" class="form-control" id="panel_quantity" placeholder="Enter quantity">
            @error('panel_quantity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- volte --}}

        <div class="form-group col-md-3">
            <label for="panel_volte">Volte</label>
            <input wire:model.lazy="panel_volte.{{ $i }}" type="number" class="form-control" id="panel_volte" placeholder="Enter volte">
            @error('panel_volte')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
</div>

@endfor

@endif

{{-- panel type --}}
{{-- panel type --}}





@endif


{{-- button to save --}}
<div class="row justify-content-center">
    <button wire:click.prevent="save" class="btn btn-primary">Save</button>
</div>

{{-- select2 --}}

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

        window.initSelectCustomerDrop = () => {
            $('.js-example-basic-single').select2({
                placeholder: 'Select a Customer'
                , allowClear: true
            });
        }
        initSelectCustomerDrop();
        $('.js-example-basic-single').on('change', function(e) {
            console.log(e.target);
            livewire.emit('selectedCustomerItem', e.target.value)
        });
        window.livewire.on('select2', () => {
            initSelectCustomerDrop();
        });

    });

</script>
<style>
    body>div>div.content-wrapper>div>div>div>div.Added>div>div.form-group.col-md-6>span>span.selection>span,
    .select2-selection,
    select2-selection--single,
    body>div>div.content-wrapper>div>div>div>div:nth-child(4)>span>span.selection>span,
    body>div>div.content-wrapper>div>div>div>div:nth-child(8)>div:nth-child(1)>span>span.selection>span {
        height: 41px;
    }

    #select2-product_Id-container,
    /* #select2-customer-container, */
    #select2-sel2Category-container {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    body>span>span>span.select2-results {
        max-height: 500px;
        overflow-y: scroll;
    }

</style>

</div>
