<?php

namespace App\Http\Livewire;

use App\Models\ProductFamily;
use Livewire\Component;

class Family extends Component
{
    public $search ;

    // edit
    public $name;
    public $discount;
    public $family_id;
    public $editMode = false;
    public $createMode = false;

    protected $rules = [
        'name' => 'required|min:3',
        'discount' => 'required|numeric',
    ];

    public function edit($id)
    {
        $family = ProductFamily::findOrFail($id);
        $this->name = $family->name;
        $this->discount = $family->discount;
        $this->family_id = $family->id;
        $this->editMode = true;
    }

    // save
    public function update()
    {
        $family = ProductFamily::findOrFail($this->family_id);
        $family->update([
            'name' => $this->name,
            'discount' => $this->discount,
        ]);

        $this->closemodal();
        session()->flash('message', 'Family Updated Successfully.');
       

    }

    // create
    public function create()
    {
        $this->createMode = true;
       
    }

    public function save(){
        $this->validate();
        ProductFamily::create([
            'name' => $this->name,
            'discount' => $this->discount,
        ]);
        $this->closemodal();
        session()->flash('message', 'Family Created Successfully.');
    }

    // closemodal
    public function closemodal()
    {
        return redirect(request()->header('Referer'));
        $this->editMode = false;
        $this->createMode = false;
    }


    public function render()
    {
        $families = ProductFamily::where('name', 'like', '%'.$this->search.'%')->get();

        return view('livewire.family',compact('families'))->extends('adminlte::page');
    }
}
