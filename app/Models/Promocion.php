<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_Promocion', 'Descuento', 'Fecha_Inicio', 'Fecha_Fin', 'ID_Producto', 'ID_Categoria'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'ID_Categoria');
    }
}
