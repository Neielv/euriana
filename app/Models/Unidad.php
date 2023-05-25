<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{

    use HasFactory;
    protected $fillable=['nombre','siglas','proceso_id','servidor_id','parent_id'];
   
    protected $table = 'unidades';

    public function sevidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }

    public function proceso()
    {
        return $this->belongsTo('App\Models\Proceso');
    }

    public function children()
    {
        return $this->hasMany(Unidad::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Unidad::class, 'parent_id');
    }

   

}
