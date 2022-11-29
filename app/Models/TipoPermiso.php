<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPermiso extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'tipopermiso';
    public function permiso()
    {
        return $this->hasMany('App\Models\Permiso');
    }
}
