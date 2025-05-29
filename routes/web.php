<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\TarjetaCreditoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\DetalleOrdenController;
use App\Http\Controllers\HistorialStockController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProveedorAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // Página principal
})->name('welcome');

/* Rutas para Clientes */
Route::prefix('clientes')->middleware("VerificarUsuario")->group(function () {
    Route::get('/', [ClienteController::class, 'index']);
    Route::post('/', [ClienteController::class, 'store']);
    Route::get('/{id}', [ClienteController::class, 'show']);
    Route::put('/{id}', [ClienteController::class, 'update']);
    Route::delete('/{id}', [ClienteController::class, 'destroy']);
});

/* Rutas para Autenticación de Usuarios */
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/dashboard', [ProductoController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout']);

/* Rutas para Autenticación de Proveedores */
Route::prefix('proveedor')->group(function () {
    Route::get('/', function () {
        return view('proveedor'); // Vista combinada
    })->name('proveedor.home');

    Route::get('/login', function () {
        return view('proveedor_login'); // Vista login
    })->name('proveedor.login');

    Route::post('/login', [ProveedorAuthController::class, 'login']);
    Route::get('/register', function () {
        return view('proveedor_register'); // Vista registro
    })->name('proveedor.register');

    Route::post('/register', [ProveedorAuthController::class, 'register']);
    Route::post('/logout', [ProveedorAuthController::class, 'logout'])->name('proveedor.logout');
});

/* ✅ Rutas protegidas con sesión personalizada de proveedor */
Route::middleware('proveedor.auth')->group(function () {
    Route::get('/proveedor/dashboard', [ProveedorAuthController::class, 'dashboard'])->name('proveedor.dashboard');

    Route::prefix('proveedor/productos')->group(function () {
        Route::get('/', [ProductoController::class, 'index']);
        Route::post('/', [ProductoController::class, 'store']);
        Route::get('/{id}', [ProductoController::class, 'show']);
        Route::put('/{id}', [ProductoController::class, 'update']);
        Route::delete('/{id}', [ProductoController::class, 'destroy']);
    });

    Route::post('/proveedor/categorias', [CategoriaProductoController::class, 'storeCategoria'])->name('proveedor.categorias.store');
});

/* Vistas adicionales */
Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');

Route::get('/tarjetas', function () {
    return view('tarjetas');
})->name('tarjetas');

Route::get('/datos-personales', function () {
    return view('datos_personales');
})->name('datos.personales');

Route::get('/direcciones', function () {
    return view('direcciones');
})->name('direcciones');
