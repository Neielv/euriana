<?php

namespace App\Http\Livewire;

use App\Models\Unidad;
use App\Models\Proceso;
use App\Models\Servidor;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CreateUnidad extends Component
{
    public $open=false;
    public $nombre,$siglas,$parent_id,$proceso_id,$servidor_id;

    protected $rules=[
        'nombre'=>'required|max:50',       
        'siglas'=>'required|max:5|unique:unidades',   
        'parent_id'=>'required',
        'proceso_id'=>'required',
        'servidor_id'=>'required'   
    ];
    
    public function render()
    {
        $padres=Unidad::all();
        $procesos=Proceso::all();
        $servidores=Servidor::all();
        return view('livewire.create-unidad',compact('padres','procesos','servidores'));
    }
    public function save()
    {
        $this->validate();
        Unidad::create([
            'nombre'=>$this->nombre,
            'siglas'=>$this->siglas,
            'parent_id'=>$this->parent_id,
            'proceso_id'=>$this->proceso_id,
            'servidor_id'=>$this->servidor_id,         
        ]);  
        $this->reset(['open','nombre','siglas','parent_id','proceso_id','servidor_id']);
        $this->emitTo('show-unidades','render');
        $this->emit('alert','Euriana','Unidadsuario creado satisfactoriamente');
    }
}
