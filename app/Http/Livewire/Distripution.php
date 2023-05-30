<?php

namespace App\Http\Livewire;

use App\Exports\DistriputionProductExport;
use App\Imports\DistriputionProductImport;
use App\Models\DistriputionProduct;
use App\Models\ProductFamily;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
class Distripution extends Component
{

    use WithPagination;
    use WithFileUploads ;
    public $file;

    public $createModal = false;
    public $updateModal = false;
    public $search = '';

    public $abb_id, $abb_description, $quantity , $price , $family_id , $families , $discount , $product_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // edit

    public function edit($id){



        $product = DistriputionProduct::find($id);
        $this->abb_id = $product->abb_id ;
        $this->abb_description = $product->abb_description ;
        $this->quantity = $product->quantity ;
        $this->price = $product->abb_price ;
        $this->family_id = $product->product_family_id ;
        $this->discount = $product->abb_discount ?? 0;

        $this->product_id = $product->id;
        $this->updateModal = true;

    }

    public function EditProduct(){

        $product = DistriputionProduct::find($this->product_id);
        $product->update([
            'abb_id' => $this->abb_id,
            'abb_description' => $this->abb_description,
            'quantity' => $this->quantity,
            'abb_price' => $this->price,
            'product_family_id' => $this->family_id,
            'abb_discount' => $this->discount ?? 0,
        ]);

        $this->updateModal = false;
        $this->resetInputFields();

        // flash message
        session()->flash('success', 'Product Updated Successfully.');
    }

    public function delete($id){
        DistriputionProduct::find($id)->delete();
        session()->flash('success', 'Product Deleted Successfully.');
    }


    public function mount(){
        $this->families = ProductFamily::get();
    }

    // alert

 // CREARTE
    public function createShowModal(){
        $this->createModal = true;
    }


    // closeModel
    public function closemodal(){
        $this->createModal = false;
        $this->updateModal = false;
    }

    // saveProduct
    public function saveProduct(){
        // $this->validate([
        //     'abb_id' => 'required',
        //     'abb_description' => 'required',
        //     'quantity' => 'required',
        //     'price' => 'required',
        //     'family_id' => 'required',
        //     'discount' => 'required',
        // ]);

        DistriputionProduct::create([
            'abb_id' => $this->abb_id,
            'abb_description' => $this->abb_description,
            'quantity' => $this->quantity,
            'abb_price' => $this->price,
            'product_family_id' => $this->family_id,
            'abb_discount' => $this->discount,
        ]);

        $this->closemodal();
        $this->resetInputFields();

        // flash message
        session()->flash('success', 'Product Created Successfully.');
      
    }

    // resetInputFields
    private function resetInputFields(){
        $this->abb_id = '';
        $this->abb_description = '';
        $this->quantity = '';
        $this->price = '';
        $this->family_id = '';
        $this->discount = '';
    }
    public function import(){
 
        // alert if file is empty
        if (!$this->file) {
 
               
           return redirect()->route('distribution')->with('error','Please Select File First');
        }
        Excel::import(new DistriputionProductImport, $this->file);
        return redirect()->route('distribution');
    }
    // export
    public function export(){
        return Excel::download(new DistriputionProductExport(), 'distripution.xlsx');
    }
    public function render()
    {
        $products = DistriputionProduct::where('abb_id', 'like', '%'.$this->search.'%')
        ->orWhere('abb_description', 'like', '%'.$this->search.'%')
        ->orWhere('quantity', 'like', '%'.$this->search.'%')
        ->paginate(10);
        return view('livewire.stock.distripution',compact('products'))->extends('adminlte::page');
    }
}
