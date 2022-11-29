<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['codigo','nombre','slug','descripcion','stock','stock_minimo', 'precio_1','precio_2','precio_3'];
    
    public function ingreso()
    {
        return $this->hasMany('App\Models\ingreso');
    }

    public function traslado()
    {
        return $this->hasMany('App\Models\traslado');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\pedido');
    }

    public function bodega()
    {
        return $this->hasMany('App\Models\bodega');
    }

}
