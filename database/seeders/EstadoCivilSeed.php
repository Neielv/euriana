<?php

namespace Database\Seeders;

use App\Models\EstadoCivil;
use Illuminate\Database\Seeder;

class EstadoCivilSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Estado1=EstadoCivil::create(['nombre'=>'Soltera/o']);
        $Estado2=EstadoCivil::create(['nombre'=>'Casada/o']);
        $Estado3=EstadoCivil::create(['nombre'=>'Divorciada/o']);
        $Estado3=EstadoCivil::create(['nombre'=>'Viudada/o']);
    }
}
