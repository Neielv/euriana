<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estadoingresos;

class Ingreso extends Model
{
    use HasFactory;
    protected $fillable=['codigo','nombre','descripcion','estadoingresos_id'];   
   
    public function estadoingresos()
    {
        return $this->belongsTo('App\Models\estadoingresos');
    }
    
}


