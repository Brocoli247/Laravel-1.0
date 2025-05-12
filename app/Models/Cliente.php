<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clientes';

    // 🔹 Definir el guard para autenticación correcta
    protected $guard = 'cliente';

    protected $fillable = ['Nombre', 'Correo_Electronico', 'password', 'Telefono', 'Apellido_Paterno', 'Apellido_Materno'];

    protected $hidden = ['password'];

    // 🔹 Configurar correctamente el identificador del modelo en autenticación
    public function getAuthIdentifierName()
    {
        return 'Correo_Electronico'; // Laravel usará esta columna para autenticar usuarios
    }

    /* Relaciones con otras tablas */
    public function direcciones()
    {
        return $this->hasMany(Direccion::class, 'ID_Cliente');
    }

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'ID_Cliente');
    }

    public function tarjetas()
    {
        return $this->hasMany(TarjetaCredito::class, 'ID_Cliente');
    }

    public function opiniones()
    {
        return $this->hasMany(Opinion::class, 'ID_Cliente');
    }

    public function carrito()
    {
        return $this->hasMany(Carrito::class, 'ID_Cliente');
    }
}