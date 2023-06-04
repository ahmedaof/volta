<div class="row" wire:ignore>
    <div class="form-group col-md-6">
       
        <label for="product">Select Product</label>
        <select label="Choose product" id="selectProduct.{{ $i }}"  class="js-example-basic-single{{ $i }} form-control">
            <option value="">Select product</option>
            @foreach($products as $product)
            <option i="{{ $product->id }}" {{ $product->id == $product_Id ? 'selected' : '' }}>{{ $product->abb_description }}</option>
            @endforeach
        </select>
        @error("product_Id.$i")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="quantity">Quantity</label>
        <input wire:model.lazy="quantity.{{ $i }}" type="number" class="form-control" placeholder="Enter quantity">
        @error("quantity.$i")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-2">
        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$i}})">remove</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        window.initSelectProductDrop=()=>{
                $('.js-example-basic-single{{ $i }}').select2({
                    placeholder: 'Select a Product',
                    allowClear: true});
            }
            initSelectProductDrop();
            $('.js-example-basic-single{{ $i }}').on('change', function (e) {
                console.log(e.target);
                livewire.emit('selectedProductItem', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initSelectProductDrop();
            });

        });

</script>
