<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialStock extends Model
{
    use HasFactory;

    protected $fillable = ['ID_Producto', 'Fecha', 'Cantidad', 'Motivo'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
