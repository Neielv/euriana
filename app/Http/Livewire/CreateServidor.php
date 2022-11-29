<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\EstadoCivil;
use App\Models\Formacion;
use App\Models\Genero;
use App\Models\Grupo;
use App\Models\Proceso;
use App\Models\TipoCliente;
use App\Models\TipoContrato;
use App\Models\Unidad;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateServidor extends Component
{
    public $open=false;
    public $cedula,$nombre,$estado_civil,$email,$telefono,$genero_id,$formacion_id,$lugar_nacimiento,$direccion;
    public $ingresos,$proceso_id,$unidad_id,$puesto,$grupo_id,$partida,$grado,$contrato_id;

    protected $rules=[
        'cedula'=>'required|max:10|min:10|unique:servidores',
        'nombre'=>'required|max:50|min:10',       
        'email'=>'required|max:50|email',
        'telefono'=>'required|max:10',
        'genero_id'=>'required',
        'formacion_id'=>'required',
        'ingresos'=>'required|min:0',
        'proceso_id'=>'required',
        'unidad_id'=>'required',
        'puesto'=>'required',
        'grupo_id'=>'required',
        'partida'=>'required|max:30',
        'grado'=>'required|max:12|min:1|',
    ];

    
    public function render()
    {
        $generos=Genero::all();
        $formaciones=Formacion::all();
        $procesos=Proceso::all();
        $unidades=Unidad::all();
        $grupos=Grupo::all();
        $estados=EstadoCivil::all();
        $contratos=TipoContrato::all();
        $unidades=Unidad::all();

        return view('livewire.create-servidor',compact('generos','formaciones','procesos','unidades','grupos','estados','contratos','unidades'));
    }

    public function save()
    {
       
        $this->validate();
        /*
        if($this->tipo_id <1 ||$this->user_id<1)
        {
            $this->emit('error','Biormed','Datos incorrectos');
        }
        else
        {
         
        Cliente::create([
            'ci'=>$this->ci,
            'nombre'=>$this->nombre,            
            'email'=>$this->email,
            'telefono'=>$this->telefono,  
            'user_id'=>$this->user_id,  
            'tipo_id'=>$this->tipo_id,
        ]);  
        $this->reset(['open','ci','nombre','email','telefono','user_id']);
        $this->emitTo('show-clientes','render');
        $this->emit('alert','Biormed','Cliente creado satisfactoriamente');
       

        }
        */
        
    }
}


