<?php

namespace Database\Seeders;

use App\Models\Canton;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Canton1= Canton::create(['provincia_id'=>'6','nombre'=>'RIOBAMBA','estado'=>true]);
        $Canton2= Canton::create(['provincia_id'=>'6','nombre'=>'ALAUSI','estado'=>true]);
        $Canton3= Canton::create(['provincia_id'=>'6','nombre'=>'CHUNCHI','estado'=>true]);
        $Canton4= Canton::create(['provincia_id'=>'6','nombre'=>'GUAMOTE','estado'=>true]);
    }
}
