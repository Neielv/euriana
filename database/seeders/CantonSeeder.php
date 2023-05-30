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
        $Canton1= Canton::create(['provincia_id'=>'1','name'=>'Cuenca']);
        $Canton2= Canton::create(['provincia_id'=>'1','name'=>'Canton1']);
        $Canton3= Canton::create(['provincia_id'=>'1','name'=>'Canron2']);
        $Canton4= Canton::create(['provincia_id'=>'1','name'=>'canton3']);
    }
}
