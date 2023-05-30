<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;
    protected $fillable=['canton_id','nombre','estado'];

    public function canton()
    {
        return $this->belongsTo('App\Models\Canton');
    } 
}
