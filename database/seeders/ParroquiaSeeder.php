<?php

namespace Database\Seeders;

use App\Models\Parroquia;
use Illuminate\Database\Seeder;

class ParroquiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Parroquia1= Parroquia::create(['canton_id'=>'2','nombre'=>'ALAUSI','estado'=>true]);
        $Parroquia2= Parroquia::create(['canton_id'=>'2','nombre'=>'GUASUNTOS','estado'=>true]);
        $Parroquia3= Parroquia::create(['canton_id'=>'2','nombre'=>'TIXAN','estado'=>true]);
        $Parroquia4= Parroquia::create(['canton_id'=>'2','nombre'=>'SIBAMBA','estado'=>true]);
    }
}
