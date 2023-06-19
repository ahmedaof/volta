<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Customers extends Component
{
    use WithPagination;
    public $search;

    // edit
    public $name;

    public $customer_id;
    public $phone;
    public $vat_number;
    public $company_name;


    public $createModal = false;
    public $updateModal = false;


    // validate input

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'name' => 'required',

    ];

    public function edit($id)
    {
        $customer = Customer::find($id);
        $this->name = $customer->name;
        $this->vat_number = $customer->vat_number;
        $this->company_name = $customer->company_name;
        $this->phone = $customer->phone;
        $this->customer_id = $customer->id;
        $this->updateModal = true;
    }

    public function EditCustomer()
    {
        $this->validate();
        $customer = Customer::find($this->customer_id);
        $customer->update([
            'name' => $this->name,
            'vat_number' => $this->vat_number,
            'company_name' => $this->company_name,
            'phone' => $this->phone,
        ]);
        $this->updateModal = false;

        // flash message
        session()->flash('success', 'Customer Updated Successfully.');
    }

    public function saveCustomer()
    {
        $this->validate([
            'name' => ['required', Rule::unique('customers')->whereNull('deleted_at')],
            'vat_number' => ['required', Rule::unique('customers')->whereNull('deleted_at')],
        ]);
        Customer::create([
            'name' => $this->name,
            'vat_number' => $this->vat_number,
            'company_name' => $this->company_name,
            'phone' => $this->phone,

        ]);
        $this->createModal = false;
        //  flash message
        session()->flash('success', 'Customer Created Successfully.');
    }

    public function create()
    {
        $this->createModal = true;
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        //  flash message
        session()->flash('success', 'Customer Deleted Successfully.');
    }

    public function closemodal()
    {
        return redirect(request()->header('Referer'));
        $this->createModal = false;
        $this->updateModal = false;
    }
    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.customers.index', compact('customers'))->extends('adminlte::page');
    }
}
