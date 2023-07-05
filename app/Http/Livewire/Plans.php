<?php

namespace App\Http\Livewire;

use App\Models\Panels;
use App\Models\PanelsTypes;
use Livewire\Component;

class Plans extends Component
{

    public $project_id,$panel_type,$panel_name,$panel_quantity,$panel_volte;
    public $delete_id , $addModel = false;


    protected $listeners = [
        'deleteAfter',

    ];
    public function mount($project_id)
    {
        $this->project_id = $project_id;
    }

    // create
    public function create()
    {
        $this->addModel = true;
    }

    public function delete($id)
    {
        $this->delete_id = $id;

        $this->dispatchBrowserEvent('swalDelete');
    }

    public function AddPanel()
    {
        $this->validate([
            'panel_type' => 'required',
            'panel_name' => 'required',
            'panel_quantity' => 'required',
            'panel_volte' => 'required',
        ]);

        $panel = new Panels();
        $panel->main_project_id = $this->project_id;
        $panel->panels_type_id = $this->panel_type;
        $panel->panel_name = $this->panel_name;
        $panel->panel_quantity = $this->panel_quantity;
        $panel->panel_volte = $this->panel_volte;
        $panel->save();

        
        $this->close();
        
    }

    // listen deleteAfter

    // close
    public function close()
    {
        // refresh
        return redirect(request()->header('Referer'));
    }

    public function deleteAfter()
    {
        $panel = Panels::find($this->delete_id);
        $panel->delete();
        session()->flash('message', 'Panel deleted successfully.');

        // flash message
        $this->dispatchBrowserEvent('success');
    }

    // edit
    public function edit($id)
    {
        return redirect()->route('PanelDetails', $id);
    }

    public function render()
    {

        $panels = Panels::where('main_project_id', $this->project_id)->get();
        $panel_Types = PanelsTypes::get();
        return view('livewire.project-panels', compact('panels','panel_Types'))->extends('adminlte::page');
    }
}
