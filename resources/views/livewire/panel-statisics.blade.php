<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">product Description</th>
                <th scope="col">quantity</th>
                <th scope="col">price after discount</th>
                <th scope="col">price after discount with vat</th>
                <th scope="col">total price after discount without vat</th>
                <th scope="col">total price after discount with vat</th>
                <th scope="col">total_price_with_vat</th>
                <th scope="col">total_price_without_vat</th>
            </tr>
        </thead>
        <tbody>

            {{-- ModelsProject::create([
                'quantity' => $quantity,
                'distripution_product_id' => $product->id,
                'main_project_id' => $main->id,
                'price_after_discount' => $price_after_discount,
                'price_after_discount_with_vat' => $price_after_discount_with_vat,
                'total_price_after_discount_without_vat' => $price_after_discount * $quantity,
                'total_price_after_discount_with_vat' => $price_after_discount_with_vat * $quantity,
                'total_price_with_vat' => ($price_after_discount_with_vat + ($product->abb_id == null ? (14 / 100) * $product->abb_price : 0)) * $quantity,
                'total_price_without_vat' => $price_after_discount_with_vat * $quantity
            ]); --}}
            @foreach ($products as $product)
            @php

            $price_after_discount = ($product->abb_price - (($product->abb_discount / 100) * $product->abb_price));
            $price_after_discount_with_vat = $price_after_discount + ($product->abb_id != null ? (14 / 100) * $product->abb_price : 0);
            @endphp
            <tr>
                <td>{{ $product->abb_description }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $price_after_discount }}</td>
                <td>{{ $price_after_discount_with_vat }}</td>
                <td>{{ $price_after_discount * $product->pivot->quantity }}</td>
                <td>{{ $price_after_discount_with_vat * $product->pivot->quantity }}</td>
                <td>{{ ($price_after_discount_with_vat + ($product->abb_id == null ? (14 / 100) * $product->abb_price : 0)) * $product->pivot->quantity }}</td>
                <td>{{ $price_after_discount_with_vat * $product->pivot->quantity }}</td>
            </tr>

                @endforeach
</div>
