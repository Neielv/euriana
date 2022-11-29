<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'formacionacademica';

    public function sevidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }
}
