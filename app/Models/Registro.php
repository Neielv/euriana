<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = ['ficha_id','activista_id'];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }

    public function activista()
    {
        return $this->belongsTo('App\Models\Activista');
    }
    
}
