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
    | Se define cómo Laravel manejará la autenticación de usuarios. Aquí 
    | cambiamos el 'provider' de 'users' a 'clientes', para que Laravel 
    | autentique correctamente los clientes en lugar de los usuarios por defecto.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'clientes', // 🔹 Cambio de 'users' a 'clientes'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Especificamos cómo Laravel obtiene los usuarios desde la base de datos.
    | Antes estaba configurado para `users`, pero lo cambiamos a `clientes`.
    |
    */

    'providers' => [
        'clientes' => [ // 🔹 Se cambia de 'users' a 'clientes'
            'driver' => 'eloquent',
            'model' => App\Models\Cliente::class, // 🔹 Se reemplaza 'User' por 'Cliente'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Se ajustó para que Laravel use la tabla `clientes` en lugar de `users`,
    | lo que permite a los clientes recuperar contraseñas correctamente.
    |
    */

    'passwords' => [
        'clientes' => [ // 🔹 Cambio de 'users' a 'clientes'
            'provider' => 'clientes', // 🔹 Ahora usa 'clientes'
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