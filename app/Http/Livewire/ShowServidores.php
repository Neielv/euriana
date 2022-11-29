<?php

namespace App\Http\Livewire;

use App\Models\Discapacidad;
use App\Models\EstadoCivil;
use App\Models\Etnia;
use App\Models\Formacion;
use App\Models\Genero;
use App\Models\Grupo;
use App\Models\Nacionalidad;
use App\Models\Servidor;
use App\Models\TipoContrato;
use App\Models\Unidad;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class ShowServidores extends Component
{
    use withPagination;
    public $search = '';    
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','delete'];
    public $cant=10;
    
    
    public $servidor;
    public $roles=[];
    public $rol;
    public $open_edit =false;

    //Catologos
    public $generos=[];
    public $estados_civil=[];
    public $formaciones=[];
    public $unidades=[];
    public $tipos_cotrato=[];
    public $grupos=[];
    public $etnias=[];
    public $nacionalidades=[];
    public $discapacidades=[];
 
    

    protected $rules=[
        'servidor.cedula'=>'required|max:10|min:10',
        'servidor.nombre'=>'required|max:50',       
        'servidor.email'=>'required|max:50',
        'servidor.telefono'=>'required|max:10',
        'servidor.rol_id'=>'required',
        'servidor.estado_civil_id'=>'required',
        'servidor.formacion_id'=>'required',
        'servidor.tipo_contrato_id'=>'required',
        'servidor.genero_id'=>'required',
        'servidor.unidad_id'=>'required',
        'servidor.grupo_id'=>'required',
        'servidor.etnia_id'=>'required',
        'servidor.nacionalidad_id'=>'required',
        'servidor.discapacidad_id'=>'required',
        'servidor.fecha_nacimiento'=>'required',
        'servidor.lugar_nacimiento'=>'required',

    ];
 
    

    public function updatingsearch()
    {
        $this->resetPage();

    }

    public function render()
    {        
        $servidores = Servidor::where('nombre', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->Paginate($this->cant);       
        return view('livewire.show-servidores',compact('servidores'));
      
    }

    public function edit(Servidor $servidor)
    {       
        $this->roles=Role::all();


        $this->generos=Genero::all();
        $this->estados_civil=EstadoCivil::all();
        $this->formaciones=Formacion::all();
        $this->unidades=Unidad::all();
        $this->tipos_cotrato=TipoContrato::all();
        $this->grupos=Grupo::all();
        $this->etnias=Etnia::all();
        $this->nacionalidades=Nacionalidad::all();
        $this->discapacidades=Discapacidad::all();

       
        $this->servidor = $servidor;
        $this->open_edit=true;
    }

    public function update()
    {
        /*$this->validate();*/
        $this->servidor->save();       
        $this->reset(['open_edit']);
        $this->emitTo('show-servidor','render');
        $this->emit('alert','Euriana','Servidor actualizado satisfactoriamente');
    }

    
    public function order($sort)
    {
        if ($this->sort = $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function delete(User $user)
    {        
        $user->delete();
    }
}

