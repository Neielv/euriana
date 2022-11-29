<?php

namespace App\Http\Livewire;

use App\Imports\Ingreso_ProductoImport;
use App\Imports\Pedido_ProdictoImport;
use App\Models\Ingreso;
use App\Models\Ingreso_Producto;
use App\Models\Pedido_Producto;
use App\Models\Permiso;
use App\Models\Producto;
use App\Models\Servidor;
use App\Models\TipoPermiso;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;



class CreatePermiso extends Component
{
    use WithFileUploads;

    public $open = false;
    public $cedula, $nombre, $unidad;
    public $fecha_desde, $fecha_hasta;
    public $hora_desde, $hora_hasta;
    public $tipo_id;
    public $motivo;
    public $saldo_d, $saldo_h, $saldo_m;
    public $saldo_disponible;

    protected $listeners = ['render', 'save'];



    protected $rules = [
        'tipo_id' => 'required',
        'fecha_desde' => 'required',
        'fecha_hasta' => 'required',
        'hora_desde' => 'required',
        'hora_hasta' => 'required',
        'motivo' => 'required'
    ];



    public function render()
    {
        $user = auth()->user();
        $servidor = Servidor::where('user_id', $user->id)->first();
        $tipos = TipoPermiso::all();
        //cargar total de vacaciones
        $this->saldo_disponible = $servidor->saldo_vacaciones;
        //cuantos días tiene disponible
        $dias = intval($servidor->saldo_vacaciones / (60 * 8));
        //del reciduo anterior, dividmos para 
        $horas = intval((($servidor->saldo_vacaciones / (60 * 8)) - $dias) * 8);
        //minutosnumber_format
        $minutos = ((((($servidor->saldo_vacaciones / (60 * 8)) - $dias) * 8) - $horas) * 60);

        $this->saldo_d = $servidor->$dias;
        $this->saldo_h = $servidor->$horas;
        $this->saldo_m = $servidor->$minutos;

        return view('livewire.create-permiso', compact('tipos', 'servidor', 'dias', 'horas', 'minutos'));
    }


    public function save()
    {
        $user = auth()->user();
        $servidor = Servidor::where('user_id', $user->id)->first();
        $this->validate();
        if ($this->fecha_desde > $this->fecha_hasta && ($this->fecha_desde == 1 || $this->fecha_desde == 2)) {
            $this->emit('error', 'Euriana', 'La fecha de salida no debe ser mayoy a la fecha de retorno ');
        } else {
            //Días que permiso
            $fechainicio = Carbon::parse($this->fecha_desde);
            $fechafin = Carbon::parse($this->fecha_hasta);
            $fehaactual = Carbon::parse(now());
            $diasDiferencia = $fechafin->diffInDays($fechainicio);
            $diasRetraso = $fehaactual->diffInDays($fechainicio);

            $horainicio = Carbon::parse($this->hora_desde);
            $horafin = Carbon::parse($this->hora_hasta);
            $horasDiferencia = $horafin->diffInMinutes($horainicio);

            $minutos = ($diasDiferencia * 8 * 60) + $horasDiferencia;

            //validar saldo disponible
            if ((float)$this->saldo_disponible < (float)$minutos) {
                $this->emit('error', 'Euriana', 'Saldo de vacaciones insuficiente');
            } else {
                //validaciones según tipo de permiso
                switch ($this->tipo_id) {
                    case (1): //Personal
                        //no puede ser mayor a 3 días
                        if ($diasDiferencia > 3) {
                            $this->emit('error', 'Euriana', 'Un permiso persional no puede exeder a 3 días');
                        } else {
                            //validar permisos pendientes                           
                            $pendientes = Permiso::where('servidor_id', '=', $servidor->id)
                                ->where('estado_id', '=', 1)->count();
                            if ($pendientes > 0) {
                                $this->emit('error', 'Euriana', 'La solicitud no se puede generar porque tiene ' . $pendientes . ' solicitudes pendientes');
                            } else {
                                //La fecha no puede ser anterior a la fecha actual                                
                                if ($diasRetraso > 0) {
                                    $this->emit('error', 'Euriana', 'No se pueden registrar solicitudes con fechas anteriores a: ' . $fehaactual->format('d/m/Y'));
                                } else {
                                    Permiso::create(
                                        [
                                            'servidor_id' => $servidor->id,
                                            'tipo_id' => $this->tipo_id,
                                            'estado_id' => 1,
                                            'fecha_desde' => $this->fecha_desde,
                                            'fecha_hasta' => $this->fecha_hasta,
                                            'hora_desde' => Carbon::parse($this->hora_desde)->format('H:i:s'),
                                            'hora_hasta' => Carbon::parse($this->hora_hasta)->format('H:i:s'),
                                            'minutos' => 0,
                                            'motivo' => $this->motivo
                                        ]
                                    );
                                    $this->reset(['open', 'tipo_id', 'fecha_desde', 'fecha_hasta', 'hora_desde', 'hora_hasta', 'motivo', 'motivo']);
                                    $this->emitTo('show-permisos', 'render');
                                    $this->emit('alert', 'Euriana', 'Solicitud de permiso registrada correctamente');
                                }
                            }
                        }

                        break;
                    case (2): //cargo a vacaciones
                        if ($diasRetraso < 0) {
                            $this->emit('error', 'Euriana', 'No se pueden registrar solicitudes con fechas anteriores a: ' . $fehaactual->format('d/m/Y'));
                        } else {
                            if ($diasDiferencia <= 7) {
                                $this->emit('error', 'Euriana', 'No se pueden generar solicitud de vacaciones con menos de 7 días');
                            }
                            else{
                                Permiso::create(
                                    [
                                        'servidor_id' => $servidor->id,
                                        'tipo_id' => $this->tipo_id,
                                        'estado_id' => 1,
                                        'fecha_desde' => $this->fecha_desde,
                                        'fecha_hasta' => $this->fecha_hasta,
                                        'hora_desde' => Carbon::parse($this->hora_desde)->format('H:i:s'),
                                        'hora_hasta' => Carbon::parse($this->hora_hasta)->format('H:i:s'),
                                        'minutos' => 0,
                                        'motivo' => $this->motivo
                                    ]
                                );
                                $this->reset(['open', 'tipo_id', 'fecha_desde', 'fecha_hasta', 'hora_desde', 'hora_hasta', 'motivo', 'motivo']);
                                $this->emitTo('show-permisos', 'render');
                                $this->emit('alert', 'Euriana', 'Solicitud de permiso registrada correctamente');

                            }

                        }
                        break;
                    case ($this->tipo_id == 3 || $this->tipo_id == 5): //Enfermedad y calamidad
                        //hasta 3 dias posteriores al siniestro pueden reportar.
                        if ($diasRetraso > 3) {
                            $this->emit('error', 'Euriana', 'La solicitud solo se puede registrar hasta 3 dias posteriores al siniestro');
                        } else {
                            Permiso::create(
                                [
                                    'servidor_id' => $servidor->id,
                                    'tipo_id' => $this->tipo_id,
                                    'estado_id' => 2,
                                    'fecha_desde' => $this->fecha_desde,
                                    'fecha_hasta' => $this->fecha_hasta,
                                    'hora_desde' => Carbon::parse($this->hora_desde)->format('H:i:s'),
                                    'hora_hasta' => Carbon::parse($this->hora_hasta)->format('H:i:s'),
                                    'minutos' => 0,
                                    'motivo' => $this->motivo
                                ]
                            );
                            $this->reset(['open', 'tipo_id', 'fecha_desde', 'fecha_hasta', 'hora_desde', 'hora_hasta', 'motivo', 'motivo']);
                            $this->emitTo('show-permisos', 'render');
                            $this->emit('alert', 'Euriana', 'Solicitud de permiso registrada correctamente');
                        }
                        break;
                    case (4)://Comisión de servicios
                            Permiso::create(
                                [
                                    'servidor_id' => $servidor->id,
                                    'tipo_id' => $this->tipo_id,
                                    'estado_id' => 1,
                                    'fecha_desde' => $this->fecha_desde,
                                    'fecha_hasta' => $this->fecha_hasta,
                                    'hora_desde' => Carbon::parse($this->hora_desde)->format('H:i:s'),
                                    'hora_hasta' => Carbon::parse($this->hora_hasta)->format('H:i:s'),
                                    'minutos' => 0,
                                    'motivo' => $this->motivo
                                ]
                            );
                            $this->reset(['open', 'tipo_id', 'fecha_desde', 'fecha_hasta', 'hora_desde', 'hora_hasta', 'motivo', 'motivo']);
                            $this->emitTo('show-permisos', 'render');
                            $this->emit('alert', 'Euriana', 'Solicitud de permiso registrada correctamente');
                        break;
                }
                //$this->emit('alert', 'Euriana', 'Permiso creado satisfactoriamente' . $minutos);
            }
            /*
           
                */
        }
    }

    
    public function cancel()
    {
        $this->archivo = null;
        $this->reset(['open', 'nombre', 'descripcion', 'producto_id', 'archivo', 'ingreso', 'detalle_guardado', 'ingreso_producto']);
    }
}
