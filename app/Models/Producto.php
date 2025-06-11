<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'ID_Producto';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'ID_Categoria',
        'ID_Proveedor',
        'imagen_url',
    ];

    /* 🚀 Relación con la tabla `categorias_productos` */
    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'ID_Categoria', 'ID_Categoria');
    }

    /* 🚀 Relación con la tabla `proveedores` */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor', 'ID_Proveedor');
    }
}