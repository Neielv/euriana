<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dirigente extends Model
{
    use HasFactory;
    protected $fillable = ['cedula','apellido','nombre','telefono','barrio', 'estado'];

    public function fichas()
    {
        return $this->hasMany('App\Models\Ficha');
    }
}
