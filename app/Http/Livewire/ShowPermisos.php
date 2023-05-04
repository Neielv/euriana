<?php

namespace App\Http\Livewire;

use App\Models\Estadoingresos;
use App\Models\Ingreso;
use App\Models\Ingreso_Producto;
use App\Models\Permiso;
use App\Models\Servidor;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class ShowPermisos extends Component
{
    use withPagination;
    public $search = ''; 
    public $editable=true;   
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','delete','imprimir'];
    public $cant=10;
    
    
    public $ingreso;
    public $estados=[];
    public $estadoingresos;
    public $nombreestadoingresos;
    public $producto;    
    public $open_edit =false;

   // public $ingreso_producto=[];
    //public $ingresoProduct;

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
      
        $permisos = Permiso::where('motivo', 'like', '%' . $this->search . '%')
        ->where('servidor_id','=',$user->servidor->id)
        ->orderBy($this->sort, $this->direction)
        ->Paginate($this->cant);       
        return view('livewire.show-permisos',compact('permisos'));
    }

    public function edit(Ingreso $ingreso)
    { 
        if ( $ingreso->estadoingresos->id==1) {
            $this->editable=true;
        }
            else
            {
                $this->editable=false;
        }
        $this->estado= $ingreso->estadoingresos;  
        $this->nombreestadoingresos=$ingreso->estadoingresos->nombre ; 
        $this->estados=Estadoingresos::all();     
        $this->ingreso = $ingreso;
        
        $this->estadoingresos=$ingreso->estadoingresos->id;



        $this->ingresoProduct=Ingreso_Producto::where('ingreso_id',$ingreso->id)->get();

                //DETALLE
        
                $indice=0;
                foreach ( $this->ingresoProduct as $item)  
                {         $indice=$indice+1;
                        $ingreso_producto=array(
                            'indice'=>$indice,
                            'producto_id'=> $item->id,
                            'producto_nombre'=> $item->producto->codigo,
                            'cantidad'=>$item->cantidad,                    
                        );
                        $this->ingreso_producto[]=$ingreso_producto;           
                }   



        $this->open_edit=true;
    }

    public function update()
    {
         
        $this->validate();
        $this->ingreso->estadoingresos_id=$this->estadoingresos;       
        $this->ingreso->save();        
        $this->reset(['open_edit']);
        $this->emitTo('show-ingresos','render');
        $this->emit('alert','Biormed','Ingreso actualizado satisfactoriamente');
    
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

    public function delete(Ingreso $ingreso)
    {        
        $ingreso->delete();
    }

    public function imprimir(Permiso $permiso)
    {
       
        $superior=Servidor::where('id',$permiso->servidor->unidad->servidor_id)->first();
        $data = [                    
            'cedula' =>$permiso->servidor->cedula,
            'nombre' =>$permiso->servidor->nombre,
            'unidad' =>$permiso->servidor->unidad->nombre,
            'tipo' =>$permiso->tipo->nombre,
            'fecha_desde'=>$permiso->fecha_desde,
            'fecha_hasta'=>$permiso->fecha_hasta,
            'hora_desde'=>$permiso->hora_desde,
            'hora_hasta'=>$permiso->hora_hasta,
            'motivo'=>$permiso->motivo,
            'superior'=>$superior->nombre
       ];
           
       $pdfContent = PDF::loadView('livewire.pdf.permiso',$data)->output();
       return response()->streamDownload(
       fn () => print($pdfContent),
       "permiso.pdf"
           );
    }
    
}

