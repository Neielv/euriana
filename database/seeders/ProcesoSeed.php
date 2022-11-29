<?php

namespace Database\Seeders;

use App\Models\Proceso;
use Illuminate\Database\Seeder;

class ProcesoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Proceso1= Proceso::create(['nombre'=>'Gobernantes']);
        $Proceso2= Proceso::create(['nombre'=>'Sustantivo']);
        $Proceso2= Proceso::create(['nombre'=>'Adjetivo']);
    }
}
