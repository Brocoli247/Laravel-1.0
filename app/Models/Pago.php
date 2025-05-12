<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['ID_Orden', 'ID_MetodoPago', 'Fecha_Pago', 'Monto'];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'ID_Orden');
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'ID_MetodoPago');
    }
}
