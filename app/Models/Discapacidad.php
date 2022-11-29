<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'discapacidades';

    public function Servidor()
    {
        return $this->hasMany('App\Models\servidor');
    }
}
