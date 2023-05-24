<?php

namespace App\Http\Livewire;
use App\Models\Proceso;
use App\Models\Servidor;
use App\Models\Unidad;

use Livewire\Component;
use Livewire\WithPagination;



class ShowUnidades extends Component
{
    use withPagination;
    public $search = '';    
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','delete'];
    public $cant=10;
    public $unidad;
    public $open_edit =false;

    //Catologos
    public $procesos=[];
    public $servidores=[];
    
    protected $rules=[
        'unidad.id'=>'required',
        'unidad.nombre'=>'required|max:50',
        'unidad.siglas'=>'required|max:5',
        'unidad.proceso_id'=>'required',
        'unidad.parent_id'=>'required',
        'unidad.servidor_id'=>'required'
    ];
    
    public function render()
    {
        $unidades = Unidad::where('unidades.nombre', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->join('servidores', 'servidores.id', '=', 'unidades.servidor_id')
        ->select('unidades.*')
        ->selectRaw("servidores.nombre as servidor_nombre")
        ->Paginate($this->cant);
        return view('livewire.show-unidades',compact('unidades'));
    }

    public function updatingsearch()
    {
        $this->resetPage();

    }

    public function edit(Unidad $unidad)
    {       
        $this->procesos=Proceso::all();
        $this->servidores=Servidor::all();        
       
        $this->unidad = $unidad;
        $this->open_edit=true;
    }
    public function update()
    {
        $this->validate();
        $this->unidad->save();       
        $this->reset(['open_edit']);
        $this->emitTo('show-unidad','render');
        $this->emit('alert','Euriana','Unidad actualizado satisfactoriamente');
    }

}
