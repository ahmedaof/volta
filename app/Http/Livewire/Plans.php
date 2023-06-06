<?php

namespace App\Http\Livewire;

use App\Models\Panels;
use Livewire\Component;

class Plans extends Component
{

    public $project_id; 
    public $delete_id;

    public function mount($project_id)
    {
        $this->project_id = $project_id;
    }

    public function delete($id)
    {
        $this->delete_id = $id;
      
        $this->dispatchBrowserEvent('swalDelete');
  
    }


    public function deleteAfter(){
        $panel = Panels::find($this->delete_id);
        $panel->delete();
        session()->flash('message', 'Panel deleted successfully.');

        // flash message
        $this->dispatchBrowserEvent('success');
    }

    public function render()
    {
                  
        $panels = Panels::where('main_project_id', $this->project_id)->get();
        return view('livewire.project-panels',compact('panels'))->extends('adminlte::page');

    }
}
