<div class="row" {{ isset($edit) && $edit ? '' :  'wire:ignore'}}>
    <div class="form-group col-md-6">
       
        <label for="product">Select Product</label>
        <select label="Choose product" id="selectProduct.{{ $key }}"  class="js-example-basic-single{{ $key }} form-control">
            <option value="">Select product</option>
            @foreach($products as $product)
            <option i="{{ $product->id }}" {{ isset($product_Id[$key]) && $product->id == $product_Id[$key] ? 'selected' : '' }}>{{ $product->abb_description }}</option>
            @endforeach
        </select>
        @error("product_Id.$key")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="quantity">Quantity</label>
        <input wire:model.lazy="quantity.{{ $key }}" type="number" class="form-control" placeholder="Enter quantity">
        @error("quantity.$key")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-2">
        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        window.initSelectProductDrop=()=>{
                $('.js-example-basic-single{{ $key }}').select2({
                    placeholder: 'Select a Product',
                    allowClear: true});
            }
            initSelectProductDrop();
            $('.js-example-basic-single{{ $key }}').on('change', function (e) {
                console.log(e.target);
                livewire.emit('selectedProductItem', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initSelectProductDrop();
            });

        });

</script>
