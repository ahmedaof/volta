<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\DistriputionProduct;
use App\Models\MainProject;
use App\Models\Panels;
use App\Models\PanelsTypes;
use App\Models\Project as ModelsProject;
use App\Models\Tab;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Project extends Component
{
    public $project_Types = ['spare parts', 'Panels'];
    public $type = 'Panels';
    public $customers;
    public $panel_number;
    public $customer;
    public $product_Id;
    public $quantity;
    public $panel_name;
    public $notes;
    public $tab_id = [];
    public $offer_number, $panel_quantity, $panel_volte;
    public $name;
    public $panels;
    public $tabs_number = 1;
    public $panel_Types;
    public $panel_type;
    public $products = [];
    //     public $tabs = ['incomming', 'outgoing' , 'additionals'
    //     ,'sub incomming 1' , 'sub outgoing 1'
    //     ,'sub incomming 2' , 'sub outgoing 2'
    //     ,'sub incomming 3' , 'sub outgoing 3'
    //     ,'sub incomming 4' , 'sub outgoing 4'
    //     ,'sub incomming 5' , 'sub outgoing 5'
    //     ,'sub incomming 6' , 'sub outgoing 6'

    // ];
    // public $tab;

    // public $tabModel  = false ;

    public $inputs = [];
    public $i = 1;

    // if customer changed to redirect 


    public $customer_id;

    // public function addTab()
    // {
    //     $this->tabModel = true;
    // }

    public function closemodal()
    {
        // $this->tabModel = false;
    }
    // public function saveTab(){
    //     // validate
    //     $this->validate([
    //         'tab' => 'required',
    //         'name' => 'required',
    //         'type' => 'required',
    //         'customer_id' => 'required',

    //     ]);
    //     $project = MainProject::create([
    //         'name' => $this->name,
    //         'type' => $this->type,
    //         'customer_id' => $this->customer_id,
    //         'notes' => $this->notes,
    //     ]);
    //    $tab = Tab::create([
    //         'name' => $this->tab,
    //         'main_project_id' => $project->id,
    //     ]);
    //     foreach ($this->product_Id as $key => $value) {
    //         $tab->distripution_product()->attach([$value => ['quantity' => $this->quantity[$key]]]);
    //     }
    //     $this->product_Id = [];
    //     $this->tab_id [] = $tab->id;
    //     $this->quantity = [];
    //     // $inputs
    //     $this->inputs = [];
    //     $this->i = 1;
    //     $this->tab = '';
    //     $this->closemodal();

    // }
    public function mount()
    {

        $this->customers = Customer::all();

        $this->products = DistriputionProduct::get(['abb_description', 'id']);

        $this->panel_Types = PanelsTypes::all(['type', 'id']);
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

        if ($this->type == 'Panels') {
            foreach ($this->panel_type as $key => $value) {
            $this->createPanel($main , $key);
            }
        } else {

            foreach ($this->product_Id as $key => $value) {
                $product = DistriputionProduct::find($value);
                $this->createProject($main, $product, $this->quantity[$key]);
            }
        }
        // refresh page with success message;
        session()->flash('message', 'Project successfully created.');
        return redirect()->route('showprojects');
    }

    // createPanel
    public function createPanel($main,$key)
    {
        $panel = Panels::create([
            'panel_name' => $this->panel_name[$key],
            'panel_quantity' => $this->panel_quantity[$key],
            'panel_volte' => $this->panel_volte[$key],
            'panels_type_id' => $this->panel_type[$key],
            'main_project_id' => $main->id,
        ]);
    }

    function createProject($main, $product, $quantity)
    {

        $price_after_discount = ($product->abb_price - (($product->abb_discount / 100) * $product->abb_price));
        $price_after_discount_with_vat = $price_after_discount + ($product->abb_id != null ? (14 / 100) * $product->abb_price : 0);
        ModelsProject::create([
            'quantity' => $quantity,
            'distripution_product_id' => $product->id,
            'main_project_id' => $main->id,
            'price_after_discount' => $price_after_discount,
            'price_after_discount_with_vat' => $price_after_discount_with_vat,
            'total_price_after_discount_without_vat' => $price_after_discount * $quantity,
            'total_price_after_discount_with_vat' => $price_after_discount_with_vat * $quantity,
            'total_price_with_vat' => ($price_after_discount_with_vat + ($product->abb_id == null ? (14 / 100) * $product->abb_price : 0)) * $quantity,
            'total_price_without_vat' => $price_after_discount_with_vat * $quantity
        ]);
    }

    public function render()
    {

        return view('livewire.projects.project')->extends('adminlte::page');
    }
}
