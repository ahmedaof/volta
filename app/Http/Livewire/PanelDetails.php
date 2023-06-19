<?php

namespace App\Http\Livewire;

use App\Models\DistriputionProduct;
use App\Models\Panels;
use App\Models\Tab;
use Livewire\Component;

class PanelDetails extends Component
{

    public $panel_id;
    protected $listeners = [
        'selectedProductItem',
    ];

    public $tabs = [
        'incomming', 'outgoing', 'additionals', 'sub incomming 1', 'sub outgoing 1', 'sub incomming 2', 'sub outgoing 2', 'sub incomming 3', 'sub outgoing 3', 'sub incomming 4', 'sub outgoing 4', 'sub incomming 5', 'sub outgoing 5', 'sub incomming 6', 'sub outgoing 6'

    ];
    public $tab,$tab_id, $i = 1, $products, $product_Id, $quantity, $inputs = [] , $inputsTabs = [], $y = 1;

    public $tabModel  = false;

    public $editModel = false;

    public function mount($panel_id)
    {
        $this->panel_id = $panel_id;
        $this->products = DistriputionProduct::all();
    }

    // addTab
    public function addTab()
    {
        $this->tabModel = true;
    }

    // edit
    public function edit($id)
    {
        $this->editModel = true;
        $tabData = Tab::find($id);
        $this->tab = $tabData->name;
        $this->tab_id = $tabData->id;
        $this->product_Id = [];
        $this->quantity = [];
        foreach ($tabData->distripution_product as $key => $value) {
            $this->i = $key ;
            array_push($this->inputs, $key + 1);
            $this->product_Id[$key] = $value->id;
            $this->quantity[$key] = $value->pivot->quantity;
        }
    }

    public function editTab(){
        $tab = Tab::find($this->tab_id);
        $tab->distripution_product()->detach();
         foreach ($this->product_Id as $key => $value) {
             $tab->distripution_product()->attach([$value => ['quantity' => $this->quantity[$key]]]);
         }

          $this->closemodal();
         
 
      }

    // delete
    public function delete($id)
    {
        $tab = Tab::find($id);
        $tab->distripution_product()->detach();
        $tab->delete();
        $this->closemodal();
    }

    // closemodal
    public function closemodal()
    {
        return redirect(request()->header('Referer'));
    }

    public function selectedProductItem($item)
    {
        if ($item) {
            $product = DistriputionProduct::where('abb_description', $item)->first();
            $this->product_Id[$this->i] = $product->id;
        } else
            $product = null;
    }

    public function addRow($i)
    {

        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function addRowTab($y)
    {

        $y = $y + 1;
        $this->y = $y;
        array_push($this->inputsTabs, $y);
    }


    public function remove($i)
    {
        foreach ($this->inputs as $key => $value) {
            if ($value == $i) {
                unset($this->inputs[$key]);
                unset($this->product_Id[$key]);
                unset($this->quantity[$key]);
            }
        }
    }


     public function saveTab(){
       $tab = Tab::create([
            'name' => $this->tab,
            'panel_id' => $this->panel_id,
        ]);
        foreach ($this->product_Id as $key => $value) {
            $tab->distripution_product()->attach([$value => ['quantity' => $this->quantity[$key]]]);
        }
         $this->closemodal();

        //  flash message
        session()->flash('message', 'Tab added successfully.');
        

     }
    

    //  back
    public function back(){
        $panel = Panels::find($this->panel_id);
        return redirect()->route('plans', $panel->main_project_id);
    }
    public function render()
    {
        $panel = Panels::find($this->panel_id);
        return view('livewire.panel-details', compact('panel'))->extends('adminlte::page');
    }
}
