<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadopedido extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];

    public function pedido()
    {
        return $this->hasMany('App\Models\pedido');
    }
   
}
