<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\DistriputionProduct;
use App\Models\MainProject;
use App\Models\Project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public $project_Types = ['spare parts', 'palets'];
    public $type = 'spare parts';
    public $customers;
    public $customer;
    public $product_Id;
    public $quantity;
    public $notes;
    public $name;
    public $products = [];

    public $inputs = [];
    public $i = 1;

    // if customer changed to redirect 


    public $customer_id;

    public function mount()
    {

        $this->customers = Customer::all();

        $this->products = DistriputionProduct::get(['abb_description', 'id']);
    }

    public function addRow($i)
    {

        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        foreach ($this->inputs as $key => $value) {
            if ($value == $i) {
                unset($this->inputs[$key]);
            }
        }
    
    }

    public $product;
    protected $listeners = [
        'selectedProductItem',
        'selectedCustomerItem',
      
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }
    //.......
    public function selectedProductItem($item)
    {
        if ($item) {
            $this->product = DistriputionProduct::where('abb_description', $item)->first();
            $this->product_Id[$this->i] = $this->product->id;
        } else
            $this->product = null;
    }
    public function selectedCustomerItem($item)
    {

        if ($item) {
            $this->customer_id = $item;
        } 
    }


    public function save()
    {


        $main =   MainProject::create([

            'name' =>  $this->name,
            'type' => $this->type,
            'customer_id' => $this->customer_id,
            'notes' => $this->notes,
        ]);

        foreach ($this->product_Id as $key => $value) {
            $product = DistriputionProduct::find($value);
            $this->createProject($main,$product,$this->quantity[$key]);
        }

        // refresh page with success message;
        session()->flash('message', 'Project successfully created.');
        return redirect()->route('showprojects');
 
    }

    function createProject($main,$product , $quantity){
        
        $price_after_discount = ($product->abb_price - (($product->abb_discount / 100) * $product->abb_price   )) ;
        $price_after_discount_with_vat = $price_after_discount + ($product->abb_id != null ? (14 / 100) * $product->abb_price : 0);
        ModelsProject::create([
            'quantity' => $quantity,
            'distripution_product_id' => $product->id,
            'main_project_id' => $main->id,
            'price_after_discount' => $price_after_discount,
            'price_after_discount_with_vat' => $price_after_discount_with_vat,
            'total_price_after_discount_without_vat' => $price_after_discount * $quantity,
            'total_price_after_discount_with_vat' => $price_after_discount_with_vat * $quantity,
            'total_price_with_vat' => ($price_after_discount_with_vat + ($product->abb_id == null ? (14 / 100) * $product->abb_price : 0)) * $quantity  ,
            'total_price_without_vat' => $price_after_discount_with_vat * $quantity
        ]);
    }

    public function render()
    {

        return view('livewire.projects.project')->extends('adminlte::page');
    }
}
