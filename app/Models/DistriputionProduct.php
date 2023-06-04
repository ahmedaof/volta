<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistriputionProduct extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];



    public function family()
    {
        return $this->belongsTo(ProductFamily::class,'product_family_id','id');
    }
}
