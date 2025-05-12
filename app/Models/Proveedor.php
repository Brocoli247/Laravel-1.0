<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_Proveedor', 'Contacto', 'Direccion'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'ID_Proveedor');
    }
}