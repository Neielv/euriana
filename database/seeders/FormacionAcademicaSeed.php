<?php

namespace Database\Seeders;

use App\Models\Formacion;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class FormacionAcademicaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Formacion1=Formacion::create(['nombre'=>'Primaria']);
        $Formacion2=Formacion::create(['nombre'=>'Secundaria']);
        $Formacion3=Formacion::create(['nombre'=>'Superior']);
        $Formacion4=Formacion::create(['nombre'=>'MAestría']);

    }
}
