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
            @foreach ($products as $product)
            @php
            $price_after_discount = ($product->abb_price - (($product->family->discount / 100) * $product->abb_price));
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
        </tbody>
    </table>
</div>
