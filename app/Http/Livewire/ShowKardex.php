<?php

namespace App\Http\Livewire;

use App\Models\Permiso;
use App\Models\Servidor;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

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
        $this->dias = intval($this->datosServidor->saldo_inicial / (60 * 8));
        //del reciduo anterior, dividmos para 
        $this->horas = intval((($this->datosServidor->saldo_inicial/ (60 * 8)) - $this->dias) * 8);
        //minutosnumber_format
        $this->minutos = ((((($this->datosServidor->saldo_inicial / (60 * 8)) - $this->dias) * 8) - $this->horas) * 60);


        $this->fechaIngreso=$this->datosServidor->fecha_ingreso;
        /*$this->permisos = Permiso::where('servidor_id', '=', $this->servidor_id )        
        ->orderBy('fecha_desde', 'asc')
        ->get(); */
        $this->permisos=$this->generarKardex($this->servidor_id,$this->datosServidor->saldo_inicial);
    }

/*
    public function generarKardex($servidor_id)
    {
        $permisos = Permiso::where('servidor_id', $servidor_id)
            ->orderBy('fecha_desde', 'asc')
            ->get();
    
        $kardex = [];
        $mesAnterior = null;
        $ultimoDiaMesAnterior = null;
        Carbon::setLocale('es');
    
        foreach ($permisos as $permiso) {
            $mesActual = Carbon::parse($permiso->fecha_desde)->format('F Y');
    
            // Verificar cambio de meses
            if ($mesAnterior !== $mesActual) {
                if ($mesAnterior == null) {
                    $mesAnterior = Carbon::createFromDate(null, 1, 1);
                }
    
                $fechaInicio = Carbon::parse($permiso->fecha_desde);
                $fechaFin = Carbon::parse($mesAnterior);
    
                $mesesDiferencia = $fechaInicio->diffInMonths($mesAnterior);
    
                // Agregar registro 'derecho a vacaciones' con haber de 20 por cada mes de diferencia
                for ($i = 0; $i < $mesesDiferencia; $i++) {
                    $registro = new \stdClass();
                    $mesVacaciones = $mesAnterior->copy()->addMonth();
                    $ultimoDiaMesAnterior = $mesVacaciones->copy()->subDay();
                    
                    $registro->Fecha = $ultimoDiaMesAnterior->format('d-m-Y');
                    $registro->Tipo = 'derecho a vacaciones - ' . $mesVacaciones->isoFormat('MMMM');
                    $registro->Debe = '2D 4H00';
                    $registro->Haber = '';
                    $kardex[] = $registro;
        
                    $mesAnterior = $mesVacaciones;
                }

            }    
            // Agregar registro de permiso
            $registro = new \stdClass();
            $registro->Fecha = Carbon::parse($permiso->fecha_desde)->format('d-m-Y');
            $registro->Tipo = $permiso->tipo->nombre;
            $registro->Debe = '';
            $registro->Haber = $this->formatoDHM($permiso->minutos);
            $kardex[] = $registro;
    
            $mesAnterior = $mesActual;
            $ultimoDiaMesAnterior = $permiso->fecha_desde;
        }
    
        return $kardex;
    }
    */

    public function generarKardex($servidor_id, $saldoInicial)
{
    $permisos = Permiso::where('servidor_id', $servidor_id)
        ->orderBy('fecha_desde', 'asc')
        ->get();

    $kardex = [];
    $mesAnterior = null;
    $ultimoDiaMesAnterior = null;
    Carbon::setLocale('es');
    $saldoAcumulado = $saldoInicial;

    foreach ($permisos as $permiso) {
        $mesActual = Carbon::parse($permiso->fecha_desde)->format('F Y');

        // Verificar cambio de meses
        if ($mesAnterior !== $mesActual) {
            if ($mesAnterior == null) {
                $mesAnterior = Carbon::createFromDate(null, 1, 1);
            }

            $fechaInicio = Carbon::parse($permiso->fecha_desde);
            $fechaFin = Carbon::parse($mesAnterior);

            $mesesDiferencia = $fechaInicio->diffInMonths($mesAnterior);

            // Agregar registro 'derecho a vacaciones' con haber de 20 por cada mes de diferencia
            for ($i = 0; $i < $mesesDiferencia; $i++) {
                $registro = new \stdClass();
                $mesVacaciones = $mesAnterior->copy()->addMonth();
                $ultimoDiaMesAnterior = $mesVacaciones->copy()->subDay();

                $registro->Fecha = $ultimoDiaMesAnterior->format('d-m-Y');
                $registro->Tipo = 'derecho a vacaciones - ' . $mesVacaciones->isoFormat('MMMM');
                $registro->Debe = '2D 4H00';
                $registro->Haber = '';
                $registro->Saldo = $saldoAcumulado;
                $kardex[] = $registro;

                $saldoAcumulado += 20;
                $mesAnterior = $mesVacaciones;
            }

        }

        // Agregar registro de permiso
        $registro = new \stdClass();
        $registro->Fecha = Carbon::parse($permiso->fecha_desde)->format('d-m-Y');
        $registro->Tipo = $permiso->tipo->nombre;
        $registro->Debe = '';
        $registro->Haber = $this->formatoDHM($permiso->minutos);
        $saldoAcumulado -= $permiso->minutos;
        $registro->Saldo = $saldoAcumulado;
        $kardex[] = $registro;

        $mesAnterior = $mesActual;
        $ultimoDiaMesAnterior = $permiso->fecha_desde;
    }

    return $kardex;
}


    public function formatoDHM($minutosTotal)
    {
        $formatoDHM='';
        $dias = intval($minutosTotal / (60 * 8));
        //del reciduo anterior, dividmos para 
        $horas = intval((($minutosTotal / (60 * 8)) - $dias) * 8);
        //minutosnumber_format
        $minutos = ((((($minutosTotal / (60 * 8)) - $dias) * 8) - $horas) * 60);
        if ($dias > 0) {
            $formatoDHM = sprintf("%02d", $dias) . 'D ';
        }
    
        $formatoDHM .= sprintf("%02d", $horas) . 'H' . sprintf("%02d", $minutos);
    
        return $formatoDHM;
    }
    public function view(Permiso $permiso)
    {        
        
    }
}
