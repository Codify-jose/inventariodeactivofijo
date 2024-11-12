<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    
    protected $table='mantenimiento';
    protected $primaryKey = 'id';
    protected $fillable = ['id_activo', 'fecha_mantenimiento','costo','descripcion','id_usuario']; 
}
