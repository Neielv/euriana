<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;

class PermisoSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Permiso= Permiso::create([
        'servidor_id'=>2,
        'tipo_id'=>1,
        'fecha_desde'=>'2021/01/01',
        'fecha_hasta'=>'2021/01/01',
        'hora_desde'=> date("H:i:s",strtotime('10:10')),
        'hora_hasta'=> date("H:i:s",strtotime('11:50')),
        'minutos'=>'120',
        'motivo'=>'Compra de pañales']);
    }
}
