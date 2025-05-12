<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = ['ID_Producto', 'ID_Cliente', 'Calificacion', 'Comentario', 'Fecha_Resena'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }
}