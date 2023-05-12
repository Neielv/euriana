<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'procesos';

    public function sevidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }

    public function unidad()
    {
        return $this->hasMany('App\Models\Unidad');
    }
    
}
