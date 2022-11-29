<?php

namespace Database\Seeders;

use App\Models\EstadoPermiso;
use Illuminate\Database\Seeder;

class EstadoPermisoSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Estado1=EstadoPermiso::create(['nombre'=>'Creado']);
        $Estado2=EstadoPermiso::create(['nombre'=>'Aprobado']);
        $Estado3=EstadoPermiso::create(['nombre'=>'Registrado']);
        $Estado4=EstadoPermiso::create(['nombre'=>'Cancelado']);
    }
}
