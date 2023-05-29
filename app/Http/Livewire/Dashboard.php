<?php

namespace App\Http\Livewire;

use App\Models\Measurement;
use Livewire\Component;

class Dashboard extends Component
{
    public $search ;
    public function render()
    {
        return view('livewire.dashboard')->extends('adminlte::page');
    }
}