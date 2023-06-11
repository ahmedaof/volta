<?php

namespace App\Http\Livewire;

use App\Models\MainProject as ModelsMainProject;
use Livewire\Component;
use PDF;

class MainProject extends Component
{

    public $searchTerm ;

    public function download($project_id)
    {

        $project = ModelsMainProject::find($project_id);
    
        $user = auth()->user();
        $view = \View::make("technical-offer",compact('user' , 'project'));
        $html_content = $view->render();
    
        PDF::SetTitle('technical-offer');
        PDF::AddPage();
    
        // Set some text to print
        PDF::Write(0, 'technical-offer', '', 0, 'C', true, 0, false, false, 0);
        PDF::SetFont('dejavu sans', '', 14);
        PDF::writeHTML($html_content, true, false, true, false, '');
    
        // Get the buffered output and clear the buffer
    
        return response()->streamDownload(function () {
            PDF::Output('technical-offer.pdf', 'D');
        }, 'technical-offer.pdf');
    }

    public function render()
    {
        $projects = ModelsMainProject::where('name', 'like', '%' . $this->searchTerm . '%')
        ->orWhere('offer_number', 'like', '%' . $this->searchTerm . '%')
        ->get();
        return view('livewire.main-projects.index', compact('projects'))->extends('adminlte::page');
    }
}
