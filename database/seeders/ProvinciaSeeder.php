<?php

namespace Database\Seeders;


use App\Models\Provincia;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Provincia1= Provincia::create(['name'=>'Azuay']);
        $Provincia1= Provincia::create(['name'=>'Bolivar']);
        $Provincia1= Provincia::create(['name'=>'Cotopaxi']);
        $Provincia1= Provincia::create(['name'=>'Cañar']);
    }
}
