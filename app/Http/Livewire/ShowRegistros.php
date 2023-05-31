<?php

namespace App\Http\Livewire;

use App\Models\Registro;
use Livewire\Component;

class ShowRegistros extends Component
{
    public function updatingsearch()
    {
        $this->resetPage();

    }

   
    public function render()
    {
        $user = auth()->user();  
        $registros = Registro::where('barrio', 'like', '%' . $this->search . '%')          
            ->orderBy($this->sort, $this->direction)        
            ->Paginate($this->cant);

            
        
        //$this->pedido_1=$pedidos[0];       
        return view('livewire.show-registros', compact('registro'));
        //return view('livewire.show-registros');
    }
}
