<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMovimiento extends Model
{
    use HasFactory;
    protected $table = 'historial_movimiento';
    protected $primaryKey = 'id';
    protected $fillable = ['id_activo','id_ubicacion_anterior', 'id_ubicacion_nueva', 'fecha_movimiento','id_usuario'];
}
