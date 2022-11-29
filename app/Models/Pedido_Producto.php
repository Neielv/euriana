<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Producto extends Model
{
    use HasFactory;
    protected $fillable=['pedido_id','producto_id','cantidad','precio','subtotal'];
    protected $table = 'pedido_producto';
    
}
