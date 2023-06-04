<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    use HasFactory;
    //protected $fillable=['user_id','cedula','nombre','genero_id','formacion_id',
    //'ingreso','proceso_id','unidad_id','puesto',
    //'grupo_id','puesto','partida','grado'];
    protected $fillable=['user_id','genero_id','estado_civil_id','formacion_id',
    'unidad_id','tipo_contrato_id','grupo_id','etnia_id','nacionalidad_id','discapacidad_id',
    'cedula','nombre','foto','fecha_nacimiento','telefono','email','email_personal',
    'puesto','partida','fecha_ingreso','lugar_nacimiento','direccion',
    'alimentacion','transporte','recidencia','saldo_inicial','saldo_vacaciones'];

    public function unidad()
    {
       
        return $this->belongsTo('App\Models\unidad');     
    }
    
    public function permisos()
    {
        return $this->hasMany('App\Models\permiso');        
    }

    public function user()
    {
        return $this->hasOne('App\Models\user');
    }
    protected $table = 'servidores';     
   
}
