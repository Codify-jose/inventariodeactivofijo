<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;

    protected $table='activos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion','codigo_inventario','fecha_adquisicion','valor','depreciacion','id_categoria','id_ubicacion','id_usuario']; 

    public function categoriaActivo()
    {
        // Relación inversa de "pertenece a"
        return $this->belongsTo(CategoriaActivo::class, 'id_categoria');
    }
}
