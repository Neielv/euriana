<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activista extends Model
{
    use HasFactory;
    protected $fillable = ['ficha_id','cedula','apellido','nombre','telefono','barrio','estado'];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }
}
