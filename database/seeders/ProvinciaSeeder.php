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
        $provincia1=Provincia::create(['nombre'=>'AZUAY','estado'=>false]);	
        $provincia2=Provincia::create(['nombre'=>'BOLIVAR','estado'=>false]);	
        $provincia3=Provincia::create(['nombre'=>'CAÑAR','estado'=>false]);	
        $provincia4=Provincia::create(['nombre'=>'CARCHI','estado'=>false]);	
        $provincia5=Provincia::create(['nombre'=>'COTOPAXI','estado'=>false]);	
        $provincia6=Provincia::create(['nombre'=>'CHIMBORAZO','estado'=>false]);	
        $provincia7=Provincia::create(['nombre'=>'EL ORO','estado'=>false]);	
        $provincia8=Provincia::create(['nombre'=>'ESMERALDAS','estado'=>false]);	
        $provincia9=Provincia::create(['nombre'=>'GUAYAS','estado'=>false]);	
        $provincia10=Provincia::create(['nombre'=>'IMBABURA','estado'=>false]);	
        $provincia11=Provincia::create(['nombre'=>'LOJA','estado'=>false]);	
        $provincia12=Provincia::create(['nombre'=>'LOS RIOS','estado'=>false]);	
        $provincia13=Provincia::create(['nombre'=>'MANABI','estado'=>false]);	
        $provincia14=Provincia::create(['nombre'=>'MORONA SANTIAGO','estado'=>false]);	
        $provincia15=Provincia::create(['nombre'=>'NAPO','estado'=>false]);	
        $provincia16=Provincia::create(['nombre'=>'PASTAZA','estado'=>false]);	
        $provincia17=Provincia::create(['nombre'=>'PICHINCHA','estado'=>false]);	
        $provincia18=Provincia::create(['nombre'=>'TUNGURAHUA','estado'=>false]);	
        $provincia19=Provincia::create(['nombre'=>'ZAMORA CHINCHIPE','estado'=>false]);	
        $provincia20=Provincia::create(['nombre'=>'GALAPAGOS','estado'=>false]);	
        $provincia21=Provincia::create(['nombre'=>'SUCUMBIOS','estado'=>false]);	
        $provincia22=Provincia::create(['nombre'=>'ORELLANA','estado'=>false]);	
        $provincia23=Provincia::create(['nombre'=>'STO DGO TSACHILAS','estado'=>false]);	
        $provincia24=Provincia::create(['nombre'=>'SANTA ELENA','estado'=>false]);	
        $provincia26=Provincia::create(['nombre'=>'EUROPA, OCEANÍA Y ASIA','estado'=>false]);	
        $provincia27=Provincia::create(['nombre'=>'CANADÁ Y ESTADOS UNIDOS','estado'=>false]);	
        $provincia28=Provincia::create(['nombre'=>'LATINOAMÉRICA, EL CARIBE Y ÁFRICA','estado'=>false]);	



    }
}
