<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable=['nombre','grado','ingresos'];
    protected $table = 'grupos';

    public function servidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }
    
}
