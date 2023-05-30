<?php

namespace App\Http\Livewire;

use App\Imports\DistriputionProductImport;
use App\Models\DistriputionProduct;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
class Distripution extends Component
{

    use WithPagination;
    use WithFileUploads ;
    public $file;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function import(){
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new DistriputionProductImport, $this->file);
        return redirect()->route('distribution');
    }
    public function render()
    {
        $products = DistriputionProduct::where('abb_id', 'like', '%'.$this->search.'%')
        ->orWhere('abb_description', 'like', '%'.$this->search.'%')
        ->orWhere('quantity', 'like', '%'.$this->search.'%')
        ->paginate(10);
        return view('livewire.distripution',compact('products'))->extends('adminlte::page');
    }
}
