<?php

namespace App\Http\Livewire;

use App\Models\Permiso;
use App\Models\Servidor;
use Livewire\Component;
use Livewire\WithPagination;

class ShowKardex extends Component
{
    use withPagination;
    public $search = ''; 
    public $editable=true;   
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','buscar'];
    public $cant=10;

    public $servidor_id;
    public $permisos = [];
    public $fechaIngreso;
    public $saldoInicial;
    public $datosServidor;
    public $dias;
    public $horas;
    public $minutos;

    public $indice;


    public function render()
    {
      

        $servidores=Servidor::all();      
        return view('livewire.show-kardex',compact('servidores'));
    }

    public function buscar()
    {       
        $this->indice=0;
        $this->datosServidor=Servidor::find($this->servidor_id);       
        //$this->saldo_disponible=$this->datosServidor->saldo_vacaciones;

        
        //cuantos días tiene disponible
        $this->dias = intval($this->datosServidor->saldo_vacaciones / (60 * 8));
        //del reciduo anterior, dividmos para 
        $this->horas = intval((($this->datosServidor->saldo_vacaciones/ (60 * 8)) - $this->dias) * 8);
        //minutosnumber_format
        $this->minutos = ((((($this->datosServidor->saldo_vacaciones / (60 * 8)) - $this->dias) * 8) - $this->horas) * 60);


        $this->fechaIngreso=$this->datosServidor->fecha_ingreso;
        $this->permisos = Permiso::where('servidor_id', '=', $this->servidor_id )        
        ->orderBy('fecha_desde', 'asc')
        ->get(); 
    }
    public function view(Permiso $permiso)
    {        
        
    }
}
