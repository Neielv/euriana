<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traslado_Producto extends Model
{
    use HasFactory;
    protected $fillable=['traslado_id','producto_id','cantidad'];
    protected $table = 'traslado_producto';

    public function producto()
    {
        return $this->belongsTo('App\Models\producto');
    }
}
