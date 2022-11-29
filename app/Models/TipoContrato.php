<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'tipo_contrato';

    public function servidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }
}
