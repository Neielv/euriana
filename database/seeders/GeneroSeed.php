<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Genero1=Genero::create(['nombre'=>'Hombre']);
        $Genero2=Genero::create(['nombre'=>'Mujer']);
        $Genero3=Genero::create(['nombre'=>'LGBTI']);
    }
}
