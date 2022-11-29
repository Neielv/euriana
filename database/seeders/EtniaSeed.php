<?php

namespace Database\Seeders;

use App\Models\Etnia;
use Illuminate\Database\Seeder;

class EtniaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Etnia1=Etnia::create(['nombre'=>'Afro']);
        $Etnia2=Etnia::create(['nombre'=>'Montuvio']);
        $Etnia3=Etnia::create(['nombre'=>'Indigena']);
        $Etnia4=Etnia::create(['nombre'=>'Mestizo']);
    }
}
