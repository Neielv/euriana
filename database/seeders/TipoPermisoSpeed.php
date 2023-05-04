<?php

namespace Database\Seeders;

use App\Models\TipoPermiso;
use Illuminate\Database\Seeder;

class TipoPermisoSpeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Tipo1=TipoPermiso::create(['nombre'=>'Permiso Personal','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo2=TipoPermiso::create(['nombre'=>'Vacaciones','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo3=TipoPermiso::create(['nombre'=>'Comisión de servicios','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo4=TipoPermiso::create(['nombre'=>'Capacitación','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo5=TipoPermiso::create(['nombre'=>'Permiso por maternidad','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo6=TipoPermiso::create(['nombre'=>'Enfermedad','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo7=TipoPermiso::create(['nombre'=>'Licencia por matrimonio','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo8=TipoPermiso::create(['nombre'=>'Permiso para cuidado de recién nacido','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo9=TipoPermiso::create(['nombre'=>'Permiso para cuidado de familiares con discapacidades severas o enfermedades catastróficas','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo10=TipoPermiso::create(['nombre'=>'Permiso para matriculación de hijos o hijas','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo11=TipoPermiso::create(['nombre'=>'Calamidad Doméstica','padre'=>0,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
    
        $Tipo12=TipoPermiso::create(['nombre'=>'Calamidad doméstica (enfermedad hijos/as)','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo13=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Por fallecimiento de los padres, hijos, hermanos, cónyuge o la o el conviviente en unión de hecho legalmente reconocida de la o el servidor)','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo14=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Por fallecimiento de los suegros, cuñados o nietos)','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo15=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Calamidad doméstica (Por accidente grave que provoque imposibilidad física o por enfermedad grave, de los hijos, cónyuge o de la o el conviviente en unión de hecho)','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo16=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Calamidad doméstica (Por accidente grave que provoque imposibilidad física o por enfermedad grave, de los padres o hermanos)','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo17=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Calamidad doméstica (Por los siniestros que afecten gravemente la propiedad o bienes de la o el servidor))','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo18=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Calamidad doméstica (Calamidad doméstica (Ante el fallecimiento de los demás parientes que se hallen contemplados hasta el segundo grado de consanguinidad o segundo de afinidad))','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        $Tipo19=TipoPermiso::create(['nombre'=>'Calamidad doméstica (Calamidad doméstica (Ante el fallecimiento de los demás parientes que se hallen contemplados hasta el segundo grado de consanguinidad o segundo de afinidad (fuera de provincia)))','padre'=>11,'restriccion'=>1,'minimo'=>1,'maximo'=>1440]);
        
    
    }
}
