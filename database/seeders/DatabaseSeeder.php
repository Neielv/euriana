<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Etnia;
use App\Models\Proceso;
use App\Models\TipoContrato;
use App\Models\TipoPermiso;
use App\Models\Unidad;
use App\Models\Provincia;
use App\Models\Canton;
use App\Models\Parroquia;
use App\Models\Permiso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([            
            RoleSeed::class, 
            UserSeed::class,
            ProcesoSeed::class,
            UnidadSpeed::class,
            GeneroSeed::class,
            EstadoCivilSeed::class,
            FormacionAcademicaSeed::class,
            TipoContratoSeed::class,
            GrupoOcupacionalSeed::class,
            EtniaSeed::class,
            NacionalidadSeed::class, 
            DiscapacidadSpeed::class,
            ServidorSpeed::class,
            TipoPermisoSpeed::class,
            EstadoPermisoSpeed::class,
            ProvinciaSeeder::class,
            CantonSeeder::class ,
            ParroquiaSeeder::class,
            PermisoSpeed::class        
        ]);       
    }
}
