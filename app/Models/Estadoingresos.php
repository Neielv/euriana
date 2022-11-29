<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadoingresos extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];

    public function ingreso()
    {
        return $this->hasMany('App\Models\ingreso');
    }
    public function traslado()
    {
        return $this->hasMany('App\Models\ingreso');
    }
    
}
