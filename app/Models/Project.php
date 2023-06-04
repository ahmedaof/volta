<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    // distripution_products
    public function distripution_products()
    {
        return $this->belongsTo(DistriputionProduct::class , 'distripution_product_id');
    }
}
