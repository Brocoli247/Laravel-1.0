<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_Categoria'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'ID_Categoria');
    }

    public function promociones()
    {
        return $this->hasMany(Promocion::class, 'ID_Categoria');
    }
}