<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $fillable = ['Tipo_Metodo'];

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ID_MetodoPago');
    }
}
