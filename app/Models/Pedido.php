<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable=['cliente_id','user_id','items','subtotal','iva','total','devolucion','factura','estadopedido_id'];
   
   
    public function cliente()
    {
        return $this->belongsTo('App\Models\cliente');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\user');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Models\producto');
    }

    public function estadopedido()
    {
        return $this->belongsTo('App\Models\estadopedido');
    }

  

}
