<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $userAdmin=User::create([
            'ci'=>'0123456789',
            'name'=>'Administrador del sistema',
            'email'=>'admin@gmail.com',            
            'phone'=>'0995814087',
            'password'=>bcrypt('12345678'),
            'rol_id'=>1         
        ])->assignRole('Admin');
        
$user1= User::create(['ci'=>'1001333713','name'=>'MINANGO NARVAEZ GLORIA MARIA','email'=>'1001333713@cnig.gob.ec','phone'=>'1001333713','password'=>bcrypt('1001333713'),'rol_id'=>2])->assignRole('Servidor');
$user2= User::create(['ci'=>'1103884134','name'=>'GUALAN JAPON ROSA VIRGINIA','email'=>'1103884134@cnig.gob.ec','phone'=>'1103884134','password'=>bcrypt('1103884134'),'rol_id'=>2])->assignRole('Servidor');
$user3= User::create(['ci'=>'1706067194','name'=>'CALDERON CAMPOVERDE CONSUELO DEL ROCIO','email'=>'1706067194@cnig.gob.ec','phone'=>'1706067194','password'=>bcrypt('1706067194'),'rol_id'=>2])->assignRole('Servidor');
$user4= User::create(['ci'=>'1706320437','name'=>'TORRES DAVILA MARIA SOLEDAD','email'=>'1706320437@cnig.gob.ec','phone'=>'1706320437','password'=>bcrypt('1706320437'),'rol_id'=>2])->assignRole('Servidor');
$user5= User::create(['ci'=>'1706960729','name'=>'CHILE RIVERA ROSA LILIANA','email'=>'1706960729@cnig.gob.ec','phone'=>'1706960729','password'=>bcrypt('1706960729'),'rol_id'=>2])->assignRole('Servidor');
$user6= User::create(['ci'=>'1707218473','name'=>'PUENTE HERNANDEZ SOLEDAD DE LOURDES','email'=>'1707218473@cnig.gob.ec','phone'=>'1707218473','password'=>bcrypt('1707218473'),'rol_id'=>2])->assignRole('Servidor');
$user7= User::create(['ci'=>'1709582637','name'=>'TELLO TORRES NANCI LEONOR','email'=>'1709582637@cnig.gob.ec','phone'=>'1709582637','password'=>bcrypt('1709582637'),'rol_id'=>2])->assignRole('Servidor');
$user8= User::create(['ci'=>'1710127059','name'=>'PONCE GUERRERO SORAYA VALENTINA','email'=>'sponce@cnig.gob.ec','phone'=>'1710127059','password'=>bcrypt('1710127059'),'rol_id'=>2])->assignRole('Servidor');
$user9= User::create(['ci'=>'1710429257','name'=>'FALCON GARZON LENIN ABDON','email'=>'1710429257@cnig.gob.ec','phone'=>'1710429257','password'=>bcrypt('1710429257'),'rol_id'=>2])->assignRole('Servidor');
$user10= User::create(['ci'=>'1710465137','name'=>'CYNTHIA ARACELLI FERREIRA SALAZAR','email'=>'1710465137@cnig.gob.ec','phone'=>'1710465137','password'=>bcrypt('1710465137'),'rol_id'=>2])->assignRole('Servidor');
$user11= User::create(['ci'=>'1711076438','name'=>'BALAREZO BUSTAMANTE ROCIO DEL PILAR','email'=>'1711076438@cnig.gob.ec','phone'=>'1711076438','password'=>bcrypt('1711076438'),'rol_id'=>2])->assignRole('Servidor');
$user12= User::create(['ci'=>'1711194462','name'=>'MUÑOZ SOTOMAYOR ELIANA MARIBEL','email'=>'1711194462@cnig.gob.ec','phone'=>'1711194462','password'=>bcrypt('1711194462'),'rol_id'=>2])->assignRole('Servidor');
$user13= User::create(['ci'=>'1712032265','name'=>'KARINA DEL ROCÍO NÚÑEZ SALVADOR','email'=>'1712032265@cnig.gob.ec','phone'=>'1712032265','password'=>bcrypt('1712032265'),'rol_id'=>2])->assignRole('Servidor');
$user14= User::create(['ci'=>'1712227162','name'=>'ZAPATA ROSERO SANDRA ELIZABETH','email'=>'1712227162@cnig.gob.ec','phone'=>'1712227162','password'=>bcrypt('1712227162'),'rol_id'=>2])->assignRole('Servidor');
$user15= User::create(['ci'=>'1712336476','name'=>'VILLENA CARRERA DAPHNE ESTEFANIA','email'=>'1712336476@cnig.gob.ec','phone'=>'1712336476','password'=>bcrypt('1712336476'),'rol_id'=>2])->assignRole('Servidor');
$user16= User::create(['ci'=>'1714042536','name'=>'DUQUE VANEGAS JANINA MARIA','email'=>'1714042536@cnig.gob.ec','phone'=>'1714042536','password'=>bcrypt('1714042536'),'rol_id'=>2])->assignRole('Servidor');
$user17= User::create(['ci'=>'1714067137','name'=>'UNDA RODRIGUEZ GABRIELA JOHANNA','email'=>'1714067137@cnig.gob.ec','phone'=>'1714067137','password'=>bcrypt('1714067137'),'rol_id'=>2])->assignRole('Servidor');
$user18= User::create(['ci'=>'1714628268','name'=>'QUIMBIURCO VALLADARES SILVIA FERNANDA','email'=>'1714628268@cnig.gob.ec','phone'=>'1714628268','password'=>bcrypt('1714628268'),'rol_id'=>2])->assignRole('Servidor');
$user19= User::create(['ci'=>'1715613525','name'=>'OSORIO MENA MERICI LEONILA','email'=>'1715613525@cnig.gob.ec','phone'=>'1715613525','password'=>bcrypt('1715613525'),'rol_id'=>2])->assignRole('Servidor');
$user20= User::create(['ci'=>'1716229255','name'=>'IBARRA JÁCOME MARÍA GABRIELA','email'=>'1716229255@cnig.gob.ec','phone'=>'1716229255','password'=>bcrypt('1716229255'),'rol_id'=>2])->assignRole('Servidor');
$user21= User::create(['ci'=>'1716553241','name'=>'PAREDES CHAVEZ GLORIA DEL CARMEN','email'=>'1716553241@cnig.gob.ec','phone'=>'1716553241','password'=>bcrypt('1716553241'),'rol_id'=>2])->assignRole('Servidor');
$user22= User::create(['ci'=>'1716680549','name'=>'MORENO VILLAFUERTE GINA PAOLA','email'=>'1716680549@cnig.gob.ec','phone'=>'1716680549','password'=>bcrypt('1716680549'),'rol_id'=>2])->assignRole('Servidor');
$user23= User::create(['ci'=>'1719109108','name'=>'COLLAGUAZO ANDRANGO WILLIAN FERNANDO','email'=>'1719109108@cnig.gob.ec','phone'=>'1719109108','password'=>bcrypt('1719109108'),'rol_id'=>2])->assignRole('Servidor');
$user24= User::create(['ci'=>'1719150078','name'=>'ARMIJOS ALBAN LESSLIE TALIA','email'=>'1719150078@cnig.gob.ec','phone'=>'1719150078','password'=>bcrypt('1719150078'),'rol_id'=>2])->assignRole('Servidor');
$user25= User::create(['ci'=>'1719292078','name'=>'GARCIA DIAZ LIDIA RAQUEL','email'=>'1719292078@cnig.gob.ec','phone'=>'1719292078','password'=>bcrypt('1719292078'),'rol_id'=>2])->assignRole('Servidor');
$user26= User::create(['ci'=>'1719703900','name'=>'ESCOBAR SALAZAR CHRISTIAN PAÚL','email'=>'1719703900@cnig.gob.ec','phone'=>'1719703900','password'=>bcrypt('1719703900'),'rol_id'=>2])->assignRole('Servidor');
$user27= User::create(['ci'=>'1720062809','name'=>'FLORES GRANDA MONICA ALEXANDRA','email'=>'1720062809@cnig.gob.ec','phone'=>'1720062809','password'=>bcrypt('1720062809'),'rol_id'=>2])->assignRole('Servidor');
$user28= User::create(['ci'=>'1721688867','name'=>'OLALLA ORTIZ PAULA ISABEL','email'=>'polalla@cnig.gob.ec','phone'=>'1721688867','password'=>bcrypt('1721688867'),'rol_id'=>2])->assignRole('Servidor');
$user29= User::create(['ci'=>'0102107281','name'=>'CRESPO ORTEGA BERTHA ELIZABETH','email'=>'0102107281@cnig.gob.ec','phone'=>'0102107281','password'=>bcrypt('0102107281'),'rol_id'=>2])->assignRole('Servidor');
$user30= User::create(['ci'=>'0105483150','name'=>'ORTIZ TORRES ESTEFANIA MARIELA','email'=>'0105483150@cnig.gob.ec','phone'=>'0105483150','password'=>bcrypt('0105483150'),'rol_id'=>2])->assignRole('Servidor');
$user31= User::create(['ci'=>'0201655784','name'=>'GARCIA GARCIA KARINA ALEXANDRA','email'=>'0201655784@cnig.gob.ec','phone'=>'0201655784','password'=>bcrypt('0201655784'),'rol_id'=>2])->assignRole('Servidor');
$user32= User::create(['ci'=>'0201985173','name'=>'AREVALO LEMA DIANA FERNANDA','email'=>'0201985173@cnig.gob.ec','phone'=>'0201985173','password'=>bcrypt('0201985173'),'rol_id'=>2])->assignRole('Servidor');
$user33= User::create(['ci'=>'0502741978','name'=>'ERIKA VANESSA GALLARDO BUSTILLOS','email'=>'0502741978@cnig.gob.ec','phone'=>'0502741978','password'=>bcrypt('0502741978'),'rol_id'=>2])->assignRole('Servidor');
$user34= User::create(['ci'=>'0703184143','name'=>'MANZO ZAMORA CECILIA AZUCENA','email'=>'0703184143@cnig.gob.ec','phone'=>'0703184143','password'=>bcrypt('0703184143'),'rol_id'=>2])->assignRole('Servidor');
$user35= User::create(['ci'=>'0918233149','name'=>'SANCHO ORDOÑEZ FERNANDO ISAAC','email'=>'0918233149@cnig.gob.ec','phone'=>'0918233149','password'=>bcrypt('0918233149'),'rol_id'=>2])->assignRole('Servidor');
$user36= User::create(['ci'=>'1002711628','name'=>'BORJA MINDA JOSE FRANCISCO','email'=>'1002711628@cnig.gob.ec','phone'=>'1002711628','password'=>bcrypt('1002711628'),'rol_id'=>2])->assignRole('Servidor');
$user37= User::create(['ci'=>'1711147262','name'=>'SANCHEZ MENDEZ LUIS FERNANDO','email'=>'1711147262@cnig.gob.ec','phone'=>'1711147262','password'=>bcrypt('1711147262'),'rol_id'=>2])->assignRole('Servidor');


        
    }
}