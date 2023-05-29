<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $search ;

    public $roles = ['admin','user' , 'super_visior'];

    // edit
    public $name;
    public $email;
    public $role;
    public $user_id;
    public $phone ;
    public $password ;
    public $password_confirmation ;

    public $createModal = false ;
    public $updateModal = false ;


    // validate input

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'role' => 'required',
        'phone' => 'required',
        'password' => 'required|confirmed|min:6',
    ];

    public function edit($id){
        $user = ModelsUser::find($id);
        $this->name = $user->name ;
        $this->email = $user->email ;
        $this->role = $user->role ;
        $this->phone = $user->phone ;
        $this->user_id = $user->id ;
        $this->updateModal = true ;
    }

    public function EditUser(){
        $this->validate();
        $user = ModelsUser::find($this->user_id);
        $user->update([
            'name' => $this->name ,
            'email' => $this->email ,
            'role' => $this->role ,
            'phone' => $this->phone ,
            'password' => bcrypt($this->password) ,
        ]);
        $this->updateModal = false ;
    }

    public function saveUser(){
        $this->validate();
        ModelsUser::create([
            'name' => $this->name ,
            'email' => $this->email ,
            'role' => $this->role ,
            'phone' => $this->phone ,
            'password' => bcrypt($this->password) ,
        ]);
        $this->createModal = false ;
    }

    public function create(){
      $this->createModal = true ;
    }

    public function delete($id){
        ModelsUser::find($id)->delete();
    }

    public function closeModal(){
        $this->createModal = false ;
    }

    public function render()
    {
        $users = ModelsUser::query()->where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.users.user',compact('users'))->extends('adminlte::page');;
    }
}
