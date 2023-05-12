<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Seeder;

class UnidadSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Unidad1=Unidad::create(['nombre'=>'Consejo Naciondal para la Igualdad de Genero','siglas'=>'CNGIE','proceso_id'=>1,'servidor_id'=>1]);
        $Unidad2=Unidad::create(['nombre'=>'Dirección de Asesoría Jurídica','siglas'=>'CNGIE','proceso_id'=>1,'servidor_id'=>1,'parent_id'=>1]);
        $Unidad3=Unidad::create(['nombre'=>'Dirección Técnica','siglas'=>'CNGIE','proceso_id'=>1,'servidor_id'=>1,'parent_id'=>1]);
        $Unidad4=Unidad::create(['nombre'=>'Dirección Administrativa Financiera','siglas'=>'CNGIE','proceso_id'=>1,'servidor_id'=>1,'parent_id'=>1]);
        $Unidad5=Unidad::create(['nombre'=>'Unidad de Comunicación Social','siglas'=>'CNGIE','proceso_id'=>1,'servidor_id'=>1,'parent_id'=>1]);
        $Unidad6=Unidad::create(['nombre'=>'Unidad de Planificación y Gestión Estratégica','siglas'=>'CNGIE','proceso_id'=>1,'servidor_id'=>1,'parent_id'=>1]);

    }
   
}
