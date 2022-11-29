<?php

namespace Database\Seeders;

use App\Models\TipoCliente;
use Illuminate\Database\Seeder;

class TipoClienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Tipo1= TipoCliente::create(['nombre'=>'Normal']);
        $Tipo= TipoCliente::create(['nombre'=>'Militar']);
        $Tipo3=TipoCliente::create(['nombre'=>'Especial']);
    }
}
