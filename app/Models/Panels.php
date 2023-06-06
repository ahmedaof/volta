<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panels extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function panelType()
    {
        return $this->belongsTo(PanelsTypes::class, 'panels_type_id');
    }
}
