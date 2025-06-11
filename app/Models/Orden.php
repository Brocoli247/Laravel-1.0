<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $primaryKey = 'ID_Orden';
    protected $table = 'ordenes';
    use HasFactory;

    protected $fillable = ['Fecha', 'Total', 'ID_Cliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function detallesOrden()
    {
        return $this->hasMany(DetalleOrden::class, 'ID_Orden');
    }

    // Alias para compatibilidad con vistas/controladores que usan $orden->detalles
    public function detalles()
    {
        return $this->detallesOrden();
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ID_Orden');
    }
}