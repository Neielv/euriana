<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Seeder;

class GrupoOcupacionalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Grupo1=Grupo::create(['nombre'=>'SP2','grado'=>'1','ingresos'=>901]);
        $Grupo2=Grupo::create(['nombre'=>'SP3','grado'=>'2','ingresos'=>986]);
        $Grupo3=Grupo::create(['nombre'=>'SP4','grado'=>'3','ingresos'=>1086]);
        $Grupo4=Grupo::create(['nombre'=>'SP5','grado'=>'4','ingresos'=>1212]);
        $Grupo5=Grupo::create(['nombre'=>'SP6','grado'=>'5','ingresos'=>1412]);
        $Grupo6=Grupo::create(['nombre'=>'SP7','grado'=>'6','ingresos'=>1678]);
        
    }
}
