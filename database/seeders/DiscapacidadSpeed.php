<?php

namespace Database\Seeders;

use App\Models\Discapacidad;
use Illuminate\Database\Seeder;

class DiscapacidadSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $discapacidad1=Discapacidad::create(['nombre'=>'Ninguana']);
        $discapacidad2=Discapacidad::create(['nombre'=>'Física']);
        $discapacidad2=Discapacidad::create(['nombre'=>'Intelectual']);
    }
}
