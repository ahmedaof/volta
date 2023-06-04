<?php

namespace App\Http\Livewire;

use App\Models\MainProject as ModelsMainProject;
use Livewire\Component;

class MainProject extends Component
{
    public function render()
    {
        $projects = ModelsMainProject::all();
        return view('livewire.main-projects.index',compact('projects'))->extends('adminlte::page');
    }
}
