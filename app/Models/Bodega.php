<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad');
    }

    
}
