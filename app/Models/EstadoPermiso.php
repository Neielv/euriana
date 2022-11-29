<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPermiso extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'estadopermiso';

    public function permiso()
    {
        return $this->hasMany('App\Models\EstadoPermiso');
    }
}
