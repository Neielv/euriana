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
        $servidores = Servidor::orderBy('nombre', 'asc')->get();     
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
        $this->permisos=$this->generarKardex($this->servidor_id,$this->datosServidor->saldo_inicial);
    }

   
    public function generarKardex($servidor_id, $saldoInicial)
    {
        $permisos = Permiso::where('servidor_id', $servidor_id)
            ->whereIn('tipo_id', [1, 2])  
            ->where ('estado_id','=',2)  
            ->orderBy('fecha_desde', 'asc')
            ->get();
    
        $kardex = [];
        $mesAnterior = null;
        $saldoAcumulado = $saldoInicial;
        $saldoAcumuladoPenal = $saldoInicial;
    
        foreach ($permisos as $permiso) {
            $mesActual = Carbon::parse($permiso->fecha_desde)->format('F Y');
    
            // Verificar cambio de meses
            if ($mesAnterior !== $mesActual) {
                if ($mesAnterior !== null) {
                    $mesAnterior = Carbon::parse($mesAnterior)->endOfMonth();
                    $ultimoDiaMesAnterior = $mesAnterior->copy();
                    $mesVacaciones = $mesAnterior->copy()->addMonthNoOverflow();
    
                    // Agregar registro 'derecho a vacaciones' con haber de 20 por cada mes de diferencia
                    $registro = new \stdClass();
                    $registro->Fecha = $ultimoDiaMesAnterior->format('d-m-Y');
                    $registro->Tipo = 'Derecho a vacaciones - ' . Carbon::parse($registro->Fecha)->isoFormat('MMMM');
                    $registro->Debe = '2D 4H00';
                    $registro->Haber = '';
                    $saldoAcumulado += 960;
                    $saldoAcumuladoPenal +=960;
                    $registro->Saldo = $this->formatoDHM($saldoAcumulado);
                    $registro->SaldoPenal=$this->formatoDHM($saldoAcumuladoPenal);
                    $registro->Penalidad = '' ;
                    $kardex[] = $registro;
    
                    
                }
    
                $mesAnterior = $mesActual;
            }
    
            // Agregar registro de permiso
            $registro = new \stdClass();
            $registro->Fecha = Carbon::parse($permiso->fecha_desde)->format('d-m-Y');
            $registro->Tipo = $permiso->tipo->nombre;
            $registro->Debe = '';
            $registro->Haber = $this->formatoDHM($permiso->minutos);
            $saldoAcumulado -= $permiso->minutos;
            $saldoAcumuladoPenal-=$permiso->minutos*1.3636;
            $registro->Saldo = $this->formatoDHM($saldoAcumulado);
            $registro->Penalidad = $this->formatoDHM($permiso->minutos*1.3636);
            $registro->SaldoPenal=$this->formatoDHM($saldoAcumuladoPenal);
            $kardex[] = $registro;
        }
    
        // Acreditar el derecho a vacaciones para el último mes
        if ($mesAnterior !== null) {
            $mesAnterior = Carbon::parse($mesAnterior)->endOfMonth();
            $ultimoDiaMesAnterior = $mesAnterior->copy();
            $mesVacaciones = $mesAnterior->copy()->addMonthNoOverflow();
    
            // Agregar registro 'derecho a vacaciones' para el último mes
            $registro = new \stdClass();
            $registro->Fecha = $ultimoDiaMesAnterior->format('d-m-Y');
            $registro->Tipo = 'Derecho a vacaciones - ' . Carbon::parse($registro->Fecha)->isoFormat('MMMM');
            $registro->Debe = '2D 4H00';
            $registro->Haber = '';            
            $registro->Penalidad='';
            $saldoAcumuladoPenal +=960;
            $saldoAcumulado += 960;
            $registro->Saldo = $this->formatoDHM($saldoAcumulado);
            $registro->SaldoPenal=$this->formatoDHM($saldoAcumuladoPenal);
            $kardex[] = $registro;
        }

         // Acreditar el derecho a vacaciones para los meses posteriores al último registro 
        if (isset($mesAnterior)) {
            $mesAnterior = $mesAnterior->copy()->addMonthNoOverflow();            
        } else {
            $mesAnterior = Carbon::now()->startOfYear();
        }

        $ultimoMes = Carbon::parse($mesAnterior)->format('F Y');
        $mesActual = Carbon::now()->format('F Y');
        while ($ultimoMes !== $mesActual) {
            $ultimoDiaMesAnterior = Carbon::parse($ultimoMes)->endOfMonth();
            $mesVacaciones = Carbon::parse($ultimoMes)->addMonthNoOverflow();

            $registro = new \stdClass();
            $registro->Fecha = $ultimoDiaMesAnterior->format('d-m-Y');
            $registro->Tipo = 'Derecho a vacaciones - ' . Carbon::parse($registro->Fecha)->isoFormat('MMMM');
            $registro->Debe = '2D 4H00';
            $registro->Haber = '';
            $saldoAcumuladoPenal += 960;
            $saldoAcumulado += 960;
            $registro->Penalidad = '';
            $registro->Saldo = $this->formatoDHM($saldoAcumulado);
            $registro->SaldoPenal = $this->formatoDHM($saldoAcumuladoPenal);
            $kardex[] = $registro;

            $ultimoMes = $mesVacaciones->format('F Y');
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
