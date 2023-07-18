<?php

namespace App\Http\Livewire;

use App\Models\MainProject as ModelsMainProject;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class MainProject extends Component
{


    // listener
    protected $listeners = [
        'deleteAfter',
        'deleteProject',
        'factoryProject'

    ];

    public $searchTerm, $from,$to,$period , $before_period , $after_period, $project_id,$name,$discount , $notes ,  $chooseModel = false , $project_type,$editModel = false;

    public function download($project_id)
    {


        $project = ModelsMainProject::find($project_id);

        $user = auth()->user();
        $pdfContent = PDF::loadView('technical-offer', compact('user', 'project'));

        return response()->streamDownload(function ()  use ($pdfContent) {
            $pdfContent->stream('technical-offer');
        }, 'TECH -- ' . $project->offer_number . '.pdf');
    }

    // downloadFinantial
    public function downloadFinantial($project_id)
    {

        $this->project_id = $project_id;
        $this->chooseModel = true;

        
    }

    // closemodal
    public function closemodal()
    {
        return redirect(request()->header('Referer'));
    }


    public function ChooseProject(){
        // validate
        $this->validate([
            'project_type' => 'required'
        ]);
        $project = ModelsMainProject::find($this->project_id);

        $user = auth()->user();
        $project_type = $this->project_type;
   
        $pdfContent = PDF::loadView('finantial-offer', compact('user', 'project','project_type'));
        $this->chooseModel = false;

        return response()->streamDownload(function ()  use ($pdfContent) {
            $pdfContent->stream('commercial-offer');
        }, 'COMM  -- ' . $project->offer_number . '.pdf');


    }

    public function deleteAfter()
    {

        $project = ModelsMainProject::find($this->project_id);

        foreach ($project->panels as $panel) {
            foreach ($panel->tabs as $tab) {
                foreach ($tab->distripution_product as $product) {
                    if ($product->pivot->quantity < $product->quantity) {

                        $product->quantity = $product->quantity - $product->pivot->quantity;
                        $product->save();
                    }
                }
            }
        }


        $project->status = 'factory';
        // replace of VE with PO
        $offer = str_replace('VE', 'PO', $project->offer_number);
        // replace char number 5 and 6 with VE
        // $project->offer_number = substr_replace($project->offer_number, 'VE', -5, 0);
        $project->offer_fin = substr_replace($offer, 'VE', -7, 2);
        $project->save();
        // flash message
        // flash message
        session()->flash('message', 'Project Factory Successfully.');

        $this->dispatchBrowserEvent('success');
    }

    // factory
    public function factory($project_id)
    {

        $this->project_id = $project_id;
        $this->dispatchBrowserEvent('swalDelete',['name' => 'factory']);

       
    }

    public function factoryProject(){

        $project = ModelsMainProject::find($this->project_id);

        foreach ($project->panels as $panel) {
            foreach ($panel->tabs as $tab) {
                foreach ($tab->distripution_product as $product) {
                    if ($product->pivot->quantity > $product->quantity) {
                        $this->dispatchBrowserEvent('swalDelete',['name' => $product->abb_description]);
                         return;
                    } else {
                        $product->quantity = $product->quantity - $product->pivot->quantity;
                        $product->save();
                     
                    }
                }
            }
        }
        $project->status = 'factory';
        // replace of VE with PO
        $offer = str_replace('VE', 'PO', $project->offer_number);
        // replace char number 5 and 6 with VE
        // $project->offer_number = substr_replace($project->offer_number, 'VE', -5, 0);
        $project->offer_fin = substr_replace($offer, 'VE', -7, 2);
        $project->save();
        // flash message
        session()->flash('message', 'Project Factory Successfully.');

    }

    public function delete($id)
    {
        $this->project_id = $id;
        $this->dispatchBrowserEvent('swalDelete',['name' => 'delete']);

    }

    public function deleteProject(){

        $project = ModelsMainProject::find($this->project_id);
        $project->delete();
        // flash
        session()->flash('message', 'Project Deleted Successfully.');
    }


    public function Edit($id)
    {
        $this->project_id = $id;
        $project = ModelsMainProject::find($this->project_id);
        $this->name = $project->name;
        $this->discount = $project->discount;
        $this->notes = $project->notes;
        $this->period = $project->period;
        $this->before_period = $project->before_period;
        $this->after_period = $project->after_period;
        $this->editModel = true;
    }

    public function SaveProject(){
        $this->validate([
            'name' => 'required',
            'discount' => 'required',
            'notes' => 'required'
        ]);
        $project = ModelsMainProject::find($this->project_id);
        $project->name = $this->name;
        
        if($this->discount != $project->discount){
             
            if($project->version == null){
                $project->version = 'R00';
            }
            $version =  substr($project->version, 1);
           
            $version = $version + 1;
            $project->version = 'R0' . $version;
        }
        $project->notes = $this->notes;
        $project->discount = $this->discount;
        $project->period = $this->period;
        $project->before_period = $this->before_period;
        $project->after_period = $this->after_period;
        $project->save();
        $this->editModel = false;
        // flash
        session()->flash('message', 'Project Updated Successfully.');
    }
    public function render()
    {
        if($this->from != null && $this->to != null && $this->searchTerm != null){
        
        $projects = ModelsMainProject::whereBetween('created_at', [$this->from, $this->to])->where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('offer_number', 'like', '%' . $this->searchTerm . '%')
            // where customer in relation with mainprojects
            ->orWhereHas('customer', function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->get();
        }else
            $projects = [];
        return view('livewire.main-projects.index', compact('projects'))->extends('adminlte::page');
    }
}
