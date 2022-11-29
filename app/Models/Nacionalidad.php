<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'nacionalidades';

    public function servidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }
}
