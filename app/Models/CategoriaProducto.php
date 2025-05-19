<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    // ✅ Especificamos el nombre correcto de la tabla en la base de datos
    protected $table = 'categorias_productos';

    // ✅ Aseguramos que 'Nombre_Categoria' sea asignable masivamente
    protected $fillable = ['Nombre_Categoria'];

    // ✅ Definimos la relación con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'ID_Categoria');
    }

    // ✅ Definimos la relación con promociones
    public function promociones()
    {
        return $this->hasMany(Promocion::class, 'ID_Categoria');
    }
}