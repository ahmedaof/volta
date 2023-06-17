<?php

namespace App\Http\Livewire;

use App\Models\PanelsTypes;
use Livewire\Component;

class PanelsType extends Component
{
    public $type;
    public $ip;
    public $thickness;
    public $Mounting;
    public $createModal = false;
    public $updateModal = false;

    public $panel_type_id;

    public function closemodal()
    {
        return redirect(request()->header('Referer'));
        $this->createModal = false;
        $this->updateModal = false;
    }

    public function create()
    {
        $this->createModal = true;
    }

    public function saveType()
    {
        $this->validate([
            'type' => 'required',
            'ip' => 'required',
            'thickness' => 'required',
            'Mounting' => 'required',
        ]);

        PanelsTypes::create([
            'type' => $this->type,
            'ip' => $this->ip,
            'thickness' => $this->thickness,
            'Mounting' => $this->Mounting,
        ]);

        $this->closemodal();
    }

    // edit
    public function edit($id)
    {
        $type = PanelsTypes::findOrFail($id);
        $this->panel_type_id = $id;
        $this->type = $type->type;
        $this->ip = $type->ip;
        $this->thickness = $type->thickness;
        $this->Mounting = $type->Mounting;
        $this->updateModal = true;
    }

    // EditType
    public function EditType()
    {
        $this->validate([
            'type' => 'required',
            'ip' => 'required',
            'thickness' => 'required',
            'Mounting' => 'required',
        ]);

        $type = PanelsTypes::findOrFail($this->panel_type_id);
        $type->update([
            'type' => $this->type,
            'ip' => $this->ip,
            'thickness' => $this->thickness,
            'Mounting' => $this->Mounting,
        ]);

        $this->closemodal();
    }

    // delete
    public function delete($id)
    {
        PanelsTypes::findOrFail($id)->delete();
    }


    public function render()
    {
        $types = PanelsTypes::all();
        return view('livewire.panels-type.index', compact('types'))->extends('adminlte::page');
    }
}
