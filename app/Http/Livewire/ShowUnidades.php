<?php

namespace App\Http\Livewire;
use App\Models\Unidad;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class ShowUnidades extends Component
{
    use withPagination;
    public $search = '';    
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render','delete'];
    public $cant=10;
    
    
    public function render()
    {
        $unidades = Unidad::where('nombre', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->Paginate($this->cant);
        return view('livewire.show-unidades',compact('unidades'));
    }
}
