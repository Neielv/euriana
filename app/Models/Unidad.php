<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{

    use HasFactory;
    protected $fillable=['nombre','siglas','proceso_id','user_id','unidad_padre'];
   
    protected $table = 'unidades';

    public function sevidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }

   

}
