<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_Producto', 'Descripcion', 'Precio', 'Stock', 'ID_Categoria', 'ID_Proveedor'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'ID_Categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor');
    }

    public function carrito()
    {
        return $this->hasMany(Carrito::class, 'ID_Producto');
    }

    public function detallesOrden()
    {
        return $this->hasMany(DetalleOrden::class, 'ID_Producto');
    }

    public function historialStock()
    {
        return $this->hasMany(HistorialStock::class, 'ID_Producto');
    }

    public function opiniones()
    {
        return $this->hasMany(Opinion::class, 'ID_Producto');
    }

    public function promociones()
    {
        return $this->hasMany(Promocion::class, 'ID_Producto');
    }
}
