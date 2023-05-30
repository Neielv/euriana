<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;
    protected $fillable=['provincia_id','nombre','estado'];

    public function parroquias()
    {
        return $this->hasMany('App\Models\Parroquia');
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

}
