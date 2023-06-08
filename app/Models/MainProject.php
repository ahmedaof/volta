<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProject extends Model
{
    use HasFactory;
    protected $guarded = [];


    // customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // pannels
    public function panels()
    {
        return $this->hasMany(Panels::class);
    }
}
