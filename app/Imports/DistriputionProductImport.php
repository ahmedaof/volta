<?php

namespace App\Imports;

use App\Models\DistriputionProduct;
use App\Models\ProductFamily;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class DistriputionProductImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {

    //    if(!empty($row[2])){
    //     $Family = \App\Models\ProductFamily::where('name', $row[2])->first();
    //     if(!$Family){
    //         $Family = \App\Models\ProductFamily::create([
    //             'name' => $row[2]
    //         ]);
    //     }
    //     return new DistriputionProduct([
    //         'abb_id'     => $row[0],
    //         'abb_description'    => $row[1], 
    //         'abb_price' => $row[3],
    //         'product_family_id' => $Family->id
    //     ]);
    //    }
    // }


    public function collection(Collection $rows)
    {
        $rows->shift();
        foreach ($rows as $row) {
            // if ($validator->fails()) {
            //     return redirect()->route('distribution')->with('error', 'Please check your file, something is wrong there.');
            // } else {
           
                if(!empty($row[2])){
                    $Family = ProductFamily::where('name', $row[2])->first();
                    if(!$Family){
                        $Family = ProductFamily::create([
                            'name' => $row[2]
                        ]);
                    }
                }
            

            $data =  DistriputionProduct::firstOrCreate([
                'abb_id'     => $row[0] ?? null,
                'abb_description'    => $row[1] ?? null,
                'abb_price' => $row[3] ?? null,
                'product_family_id' => $Family?->id ?? null
            ]);

          
        }
        return redirect()->route('distribution')->with('sucess', 'Data has been imported successfully.');
    }
 }
