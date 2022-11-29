<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    use HasFactory;
    protected $fillable=['nombre','descripcion','origen_id','destino_id','estadoingresos_id'];

    public function producto()
    {
        return $this->belongsTo('App\Models\producto');
    }

    public function origen()
    {
        return $this->belongsTo('App\Models\ciudad');
    }
    public function destino()
    {
        return $this->belongsTo('App\Models\ciudad');
    }
    public function estadoingresos()
    {
        return $this->belongsTo('App\Models\estadoingresos');
    }
}
