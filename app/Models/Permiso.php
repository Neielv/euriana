<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $fillable=['servidor_id','estado_id','tipo_id','fecha_desde','fecha_hasta','hora_desde','hora_hasta','minutos','motivo'];
    protected $table = 'permisos';

    public function estado()
    {
        return $this->belongsTo('App\Models\EstadoPermiso');
    }
    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoPermiso');
    }
    public function servidor()
    {
        return $this->belongsTo('App\Models\Servidor');
    }
    
}
