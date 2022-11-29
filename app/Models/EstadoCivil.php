<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'estado_civil';

    public function Servidor()
    {
        return $this->hasMany('App\Models\servidor');
    }
}
