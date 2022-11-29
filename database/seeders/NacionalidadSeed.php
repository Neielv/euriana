<?php

namespace Database\Seeders;

use App\Models\Nacionalidad;
use Illuminate\Database\Seeder;

class NacionalidadSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Nacionaliad1=Nacionalidad::create(['nombre'=>'Ecuatoriano']);
        $Nacionaliad2=Nacionalidad::create(['nombre'=>'Colombiano']);
        $Nacionaliad2=Nacionalidad::create(['nombre'=>'Boliviano']);
    }
}
