<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'generos';

    public function servidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }
}
