<?php

namespace App\Http\Livewire;

use Carbon\Carbon;

use App\Models\Estadoingresos;
use App\Models\Ingreso;
use App\Models\Ingreso_Producto;
use App\Models\Permiso;
use App\Models\Servidor;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowAprobaciones extends Component
{
    use withPagination;
    public $search = ''; 
    public $editable=true;   
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','delete','imprimir','aprobar'];
    public $cant=10;
    
    
    public $ingreso;
    public $estados=[];
    public $estadoingresos;
    public $nombreestadoingresos;
    public $producto;    
    public $open_edit =false;

   
    protected $rules=[
        'ingreso.nombre'=>'required|max:50',          
        'ingreso.descripcion'=>'required|max:100'                        
    ];

    public function updatingsearch()
    {
        $this->resetPage();

    }

    public function render()
    {        

        $user = auth()->user();

       


        $permisos=Permiso::Where('permisos.estado_id','=',1)
                ->join('tipopermiso', 'tipopermiso.id', '=', 'permisos.tipo_id')
                ->join('servidores', 'servidores.id', '=', 'permisos.servidor_id')                
                ->join('unidades', 'unidades.id', '=', 'servidores.unidad_id')
                ->where('unidades.id', '=', $user->servidor->unidad_id)
                ->where('unidades.servidor_id', '=', $user->servidor->id)
                ->select('permisos.id')
                ->selectRaw("servidores.nombre as servidor")
                ->selectRaw("tipopermiso.nombre as tipo")
                ->selectRaw("permisos.fecha_desde as fecha_desde")
                ->selectRaw("permisos.hora_desde as hora_desde")
                ->selectRaw("permisos.fecha_hasta as fecha_hasta")
                ->selectRaw("permisos.hora_hasta as hora_hasta")
                //->Paginate($this->cant)
                ->get();


        
      
       /* $permisos = Permiso::where('motivo', 'like', '%' . $this->search . '%')        
        ->orderBy($this->sort, $this->direction)
        ->Paginate($this->cant);  */     
        return view('livewire.show-Aprobaciones',compact('permisos'));
    }
    public function delete(Permiso $permiso)
    {        
        $user->delete();
    }
    public function aprobar($id)
    {        
        $permiso = Permiso::find($id);

        $inicio = Carbon::parse("$permiso->fecha_desde $permiso->hora_desde");
        $fin = Carbon::parse("$permiso->fecha_hasta $permiso->hora_hasta");
        $diferenciaMinutos = $fin->diffInMinutes($inicio);
        $permiso->estado_id = 2;

        
        
        $servidor = Servidor::find($permiso->servidor_id);
        $servidor->saldo_vacaciones=$servidor->saldo_vacaciones-$diferenciaMinutos;

        $servidor->save();
        $permiso->save();
    }

    public function negar($id)
    {        
        $permiso = Permiso::find($id);
        $permiso->estado_id = 4;
        $permiso->save();
    }
}
