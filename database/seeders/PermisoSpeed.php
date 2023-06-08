<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermisoSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permiso1=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '13/01/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '13/01/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'480','motivo'=>'Carga automática']);
        $Permiso2=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '18/01/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '18/01/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('13:13')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'190','motivo'=>'Carga automática']);
        $Permiso3=Permiso::create(['servidor_id'=>8,'tipo_id'=>3,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '02/02/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '02/02/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('08:08')),'minutos'=>'47','motivo'=>'Carga automática']);
        $Permiso4=Permiso::create(['servidor_id'=>8,'tipo_id'=>3,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '03/02/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '03/02/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('10:10')),'minutos'=>'160','motivo'=>'Carga automática']);
        $Permiso5=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '07/02/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '07/02/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('08:08')),'minutos'=>'26','motivo'=>'Carga automática']);
        $Permiso6=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '15/02/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '15/02/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('08:08')),'minutos'=>'53','motivo'=>'Carga automática']);
        $Permiso7=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '28/02/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '28/02/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('14:14')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'130','motivo'=>'Carga automática']);
        $Permiso8=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '02/03/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '03/03/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'960','motivo'=>'Carga automática']);
        $Permiso9=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '17/03/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '17/03/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('10:10')),'minutos'=>'160','motivo'=>'Carga automática']);
        $Permiso10=Permiso::create(['servidor_id'=>8,'tipo_id'=>3,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '13/03/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '13/03/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('14:14')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'130','motivo'=>'Carga automática']);
        $Permiso11=Permiso::create(['servidor_id'=>8,'tipo_id'=>6,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '21/03/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '23/03/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'1440','motivo'=>'Carga automática']);
        $Permiso12=Permiso::create(['servidor_id'=>8,'tipo_id'=>6,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '24/03/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '24/03/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'480','motivo'=>'Carga automática']);
        $Permiso13=Permiso::create(['servidor_id'=>8,'tipo_id'=>12,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '03/04/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '10/04/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'3840','motivo'=>'Carga automática']);
        $Permiso14=Permiso::create(['servidor_id'=>8,'tipo_id'=>12,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '12/04/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '12/04/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('10:10')),'minutos'=>'135','motivo'=>'Carga automática']);
        $Permiso15=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '17/04/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '17/04/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('08:08')),'minutos'=>'20','motivo'=>'Carga automática']);
        $Permiso16=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '16/02/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '16/02/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('15:15')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'60','motivo'=>'Carga automática']);
        $Permiso17=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '19/04/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '19/04/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('15:15')),'hora_hasta'=>date("H:i:s",strtotime('16:16')),'minutos'=>'65','motivo'=>'Carga automática']);
        $Permiso18=Permiso::create(['servidor_id'=>8,'tipo_id'=>1,'estado_id'=>2,'fecha_desde'=>Carbon::createFromFormat("d/m/Y", '24/04/2023')->format("Y-m-d"),'fecha_hasta'=>Carbon::createFromFormat("d/m/Y", '24/04/2023')->format("Y-m-d"),'hora_desde'=>date("H:i:s",strtotime('08:08')),'hora_hasta'=>date("H:i:s",strtotime('08:08')),'minutos'=>'21','motivo'=>'Carga automática']);

    }
    
}
