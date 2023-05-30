<?php

namespace App\Exports;

use App\Models\DistriputionProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DistriputionProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            '#',
            'ABB ID',
            'ABB Description',
            'Family',
            'price',
            'Quantity',

        ];
    }

    public function collection()
    {
        // add heading row

        $products = DistriputionProduct::with('family')->get(['id','abb_id','abb_description','product_family_id','abb_price','quantity']);
        $products->transform(function($product) {
            $product->product_family_id = $product->family?->name ?? '';
            return $product;
        });
        return $products;
    }
}
