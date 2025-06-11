<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $primaryKey = 'ID_Carrito';
    protected $table = 'carrito';
    use HasFactory;

    protected $fillable = ['ID_Cliente', 'ID_Producto', 'Cantidad'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
