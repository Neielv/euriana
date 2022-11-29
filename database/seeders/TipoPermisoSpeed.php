<?php

namespace Database\Seeders;

use App\Models\TipoPermiso;
use Illuminate\Database\Seeder;

class TipoPermisoSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Tipo1=TipoPermiso::create(['nombre'=>'Permiso Personal']);
        $Tipo2=TipoPermiso::create(['nombre'=>'Cargo a vacaciones']);
        $Tipo3=TipoPermiso::create(['nombre'=>'Enfermedad']);
        $Tipo4=TipoPermiso::create(['nombre'=>'Comisión de servicios']);
        $Tipo5=TipoPermiso::create(['nombre'=>'Calamidad Doméstica']);
    }
}
