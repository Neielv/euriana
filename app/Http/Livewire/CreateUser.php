<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Ciudad;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $open=false;
    public $ci,$name,$email,$phone,$ciudad_id,$rol_id;

    protected $rules=[
        'ci'=>'required|max:10|min:10|unique:users',
        'name'=>'required|max:50',       
        'email'=>'required|max:50|email|unique:users',        
        'rol_id'=>'required',
        'phone'=>'required|max:10'       
    ];

    public function save()
    {
        $this->validate();
        User::create([
            'ci'=>$this->ci,
            'name'=>$this->name,            
            'email'=>$this->email,
            'phone'=>$this->phone,
            'rol_id'=>$this->rol_id,
            'password'=>bcrypt($this->ci)           
        ]);  
        $this->reset(['open','ci','name','email','phone']);
        $this->emitTo('show-users','render');
        $this->emit('alert','Biormed','Usuario creado satisfactoriamente');
    }
    public function render()
    {
        $roles=Role::all();
        return view('livewire.create-user',compact('roles'));
    }
}


