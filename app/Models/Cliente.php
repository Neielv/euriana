<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['ci','nombre','email','telefono','user_id','tipo_id'];
    
    public function pedidos()
    {
        return $this->hasMany('App\Models\pedido');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoCliente');
    }
}

