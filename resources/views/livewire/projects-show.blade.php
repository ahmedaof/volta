<div>
    {{-- show projects table --}}
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
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->distripution_products?->abb_description ?? 'NA' }}</td>
                <td>{{ $project->quantity }}</td>
                <td>{{ $project->price_after_discount }}</td>
                <td>{{ $project->price_after_discount_with_vat }}</td>
                <td>{{ $project->total_price_after_discount_without_vat }}</td>
                <td>{{ $project->total_price_after_discount_with_vat }}</td>
                <td>{{ $project->total_price_with_vat }}</td>
                <td>{{ $project->total_price_without_vat }}</td>

       
            </tr>
            @endforeach
        </tbody>

</div>
