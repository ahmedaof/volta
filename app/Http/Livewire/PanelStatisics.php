<?php

namespace App\Http\Livewire;

use App\Models\Tab;
use Livewire\Component;

class PanelStatisics extends Component
{

    public $tab_id;

    public function mount($tab_id)
    {
        $this->tab_id = $tab_id;
    }

    public function render()
    {
        $products = Tab::find($this->tab_id)->distripution_product;
        return view('livewire.panel-statisics',compact('products'))->extends('adminlte::page');
    }
}
