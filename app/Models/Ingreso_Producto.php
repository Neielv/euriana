<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso_Producto extends Model
{
    use HasFactory;
    protected $fillable=['ingreso_id','producto_id','cantidad'];
    protected $table = 'ingreso_producto';

    public function producto()
    {
        return $this->belongsTo('App\Models\producto');
    }
    

}
