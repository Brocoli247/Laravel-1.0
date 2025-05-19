<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Aquí se establecen los valores predeterminados para la autenticación.
    | Se cambió la configuración de 'passwords' de 'users' a 'clientes',
    | asegurando que Laravel use la tabla correcta.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'clientes', // 🔹 Cambio de 'users' a 'clientes'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Se define cómo Laravel manejará la autenticación de usuarios.
    | Se agregó un nuevo guard para 'proveedores', permitiendo su autenticación.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'clientes',
        ],

        'proveedor' => [ // ✅ Configuración correcta del guard 'proveedor'
            'driver' => 'session',
            'provider' => 'proveedores',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Especificamos cómo Laravel obtiene los usuarios desde la base de datos.
    | Antes estaba configurado para `users`, pero ahora usamos `clientes` y `proveedores`.
    |
    */

    'providers' => [
        'clientes' => [ 
            'driver' => 'eloquent',
            'model' => App\Models\Cliente::class, 
        ],

        'proveedores' => [ 
            'driver' => 'eloquent',
            'model' => App\Models\Proveedor::class, 
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Se ajustó para que Laravel use la tabla `clientes` y `proveedores`,
    | permitiendo a ambos tipos de usuarios recuperar contraseñas correctamente.
    |
    */

    'passwords' => [
        'clientes' => [ 
            'provider' => 'clientes', 
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'proveedores' => [ 
            'provider' => 'proveedores', 
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Tiempo antes de que Laravel pida nuevamente la confirmación de la contraseña.
    |
    */

    'password_timeout' => 10800,

];