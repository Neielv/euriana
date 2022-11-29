<?php

namespace Database\Seeders;

use App\Models\TipoContrato;
use Illuminate\Database\Seeder;

class TipoContratoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Tipo1=TipoContrato::create(['nombre'=>'Servicios Profesionales']);
        $Tipo= TipoContrato::create(['nombre'=>'Servicios ocacionales']);
        $Tipo3=TipoContrato::create(['nombre'=>'Nombramiento provicional']);
        $Tipo4=TipoContrato::create(['nombre'=>'Nombramiento definitivo']);
        
    }
}
