<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistriputionProduct extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function family()
    {
        return $this->belongsTo(ProductFamily::class,'product_family_id','id');
    }
}
