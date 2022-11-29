<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'tipocliente';

    public function cliente()
    {
        return $this->hasMany('App\Models\cliente');
    }
  
}
