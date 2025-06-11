<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Proveedor extends Authenticatable
{
    protected $primaryKey = 'ID_Proveedor';
    use HasFactory;

    protected $table = 'proveedores';

    protected $guarded = []; // ✅ Corrige el uso de $guarded

    protected $guard_name = 'proveedor'; // ✅ Define correctamente el guard de autenticación

    protected $fillable = ['Nombre_Proveedor', 'Contacto', 'Direccion', 'Correo_Electronico', 'password'];

    protected $hidden = ['password'];

    // ✅ Define correctamente el identificador de autenticación
    public function getAuthIdentifierName()
    {
        return 'Correo_Electronico';
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'ID_Proveedor');
    }
}