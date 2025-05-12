<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetaCredito extends Model
{
    use HasFactory;

    protected $fillable = ['ID_Cliente', 'Numero_Tarjeta', 'Fecha_Expiracion', 'CVV', 'Tipo_Tarjeta'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }
}
