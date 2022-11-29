<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    protected $table = 'etnias';

    public function sevidor()
    {
        return $this->hasMany('App\Models\Servidor');
    }
}
