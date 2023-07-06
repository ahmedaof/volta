<?php

namespace App\Http\Livewire;

use App\Models\MainProject;
use Livewire\Component;

class ProjectDetails extends Component
{

    public $project_id;
    public function mount($project_id)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {

        $project = MainProject::find($this->project_id);

        $panels = $project->panels;

        $tabs = $panels->map(function ($panel) {
            return $panel->tabs;
        })->flatten();

        $products = $tabs->map(function ($tab) {
            return $tab->distripution_product;
        })->flatten();
        

        return view('livewire.panel-statisics',compact('products'))->extends('adminlte::page');
    }
}
