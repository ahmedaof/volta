<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function distripution_product()
    {
        return $this->belongsToMany(DistriputionProduct::class, 'distributed_product_tabs', 'tab_id', 'distripution_product_id');
    }


}
