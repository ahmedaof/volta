<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelsTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'ip',
        'thickness',
        'Mounting',
    ];
}
