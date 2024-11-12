<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaActivo extends Model
{
    use HasFactory;
    protected $table = 'categorias_activos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion'];

    public function activos()
    {
        // Relación de "uno a muchos"
        return $this->hasMany(Activo::class, 'id_categoria');
    }
}
