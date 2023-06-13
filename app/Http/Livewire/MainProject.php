<?php

namespace App\Http\Livewire;

use App\Models\MainProject as ModelsMainProject;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class MainProject extends Component
{


    public $searchTerm;

    public function download($project_id)
    {

        $project = ModelsMainProject::find($project_id);

        $user = auth()->user();
        $pdfContent = PDF::loadView('technical-offer', compact('user' , 'project'))->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "technical-offer.pdf"
        );
        
    
    }

    public function delete($id)
    {
        $project = ModelsMainProject::find($id);
        $project->delete();
        // flash
        session()->flash('message', 'Project Deleted Successfully.');
    }   

    public function render()
    {
        $projects = ModelsMainProject::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('offer_number', 'like', '%' . $this->searchTerm . '%')
            ->get();
        return view('livewire.main-projects.index', compact('projects'))->extends('adminlte::page');
    }
}
