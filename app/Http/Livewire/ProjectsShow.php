<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectsShow extends Component
{
    public $project_id;
    public function mount($project_id)
    {
        $this->project_id = $project_id;
    }
    public function render()
    {
        $projects = Project::where('main_project_id', $this->project_id)->get();
        // dd($projects[0]->distripution_products);
        return view('livewire.projects-show',compact('projects'))->extends('adminlte::page');
    }
}
