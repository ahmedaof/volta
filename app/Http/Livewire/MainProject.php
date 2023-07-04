<?php

namespace App\Http\Livewire;

use App\Models\MainProject as ModelsMainProject;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class MainProject extends Component
{


    public $searchTerm;

    public function download($project_id)
    {
        

        $project = ModelsMainProject::find($project_id);

        $user = auth()->user();
        $pdfContent = PDF::loadView('technical-offer', compact('user' , 'project'));
         
        return response()->streamDownload(function ()  use ($pdfContent) {
            $pdfContent->stream('technical-offer');
        }, $project->offer_number.'.pdf');

    
    }

    // downloadFinantial
    public function downloadFinantial($project_id)
    {
        

        $project = ModelsMainProject::find($project_id);

        $user = auth()->user();
        $total = 0;
        foreach ($project->panels as $panel) {
            foreach ($panel->tabs as $tab) {
                foreach ($tab->distripution_product as $product) {
                    $total += $product->pivot->quantity * 
                    ($product->abb_price - ($product->abb_price * $product->family->discount ?? 0 / 100));
                }
            }
        }
        $pdfContent = PDF::loadView('finantial-offer', compact('user' , 'project','total'));
         
        return response()->streamDownload(function ()  use ($pdfContent) {
            $pdfContent->stream('commercial-offer');
        }, $project->offer_number.'.pdf');

    
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
