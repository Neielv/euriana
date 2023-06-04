<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    protected $fillable = ['parroquia_id','dirigente_id','barrio'];

    public function dirigente()
    {
        return $this->belongsTo('App\Models\Dirigente');
    }

    public function activistas()
    {
        return $this->hasMany('App\Models\Activista');
    }
}
