<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $fillable=['codigo','nombre','contacto','telefono'];
    protected $table = 'ciudades';

    //relacion uno a muchos con usuarios
    public function users()
    {
        return $this->hasMany('App\Models\user');
    }

    public function origen()
    {
        return $this->hasMany('App\Models\user','origen_id');
    }
    public function destino()
    {
        return $this->hasMany('App\Models\user','destino_id');
    }

    public function bodega()
    {
        return $this->hasMany('App\Models\bodega');
    }
    
}
