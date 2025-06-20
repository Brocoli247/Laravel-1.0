<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    protected $table = 'detalles_ordenes';
    use HasFactory;

    protected $fillable = ['ID_Orden', 'ID_Producto', 'Cantidad', 'Subtotal'];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'ID_Orden');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
