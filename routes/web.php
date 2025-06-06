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
    return redirect()->route('login'); // Redirige directamente al login del cliente
});

/* ==================== RUTAS PARA CLIENTES ==================== */
Route::prefix('clientes')->middleware("VerificarUsuario")->group(function () {
    Route::get('/', [ClienteController::class, 'index']);
    Route::post('/', [ClienteController::class, 'store']);
    Route::get('/{id}', [ClienteController::class, 'show']);
    Route::put('/{id}', [ClienteController::class, 'update']);
    Route::delete('/{id}', [ClienteController::class, 'destroy']);
});

/* === Autenticación de Clientes === */
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [ProductoController::class, 'index'])->middleware('VerificarUsuario')->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ==================== RUTAS PARA PROVEEDORES ==================== */
Route::prefix('proveedor')->group(function () {
    // Login del proveedor (vista corregida)
    Route::get('/login', function () {
        return view('proveedor_login'); // Cambiado a proveedor_login.blade.php
    })->name('proveedor.login');

    Route::post('/login', [ProveedorAuthController::class, 'login'])->name('proveedor.login.process');

    // Registro del proveedor (vista corregida)
    Route::get('/register', function () {
        return view('proveedor_register'); // Cambiado a proveedor_register.blade.php
    })->name('proveedor.register');

    Route::post('/register', [ProveedorAuthController::class, 'register'])->name('proveedor.register.process');

    // Logout del proveedor
    Route::post('/logout', [ProveedorAuthController::class, 'logout'])->name('proveedor.logout');

    // Dashboard del proveedor
    Route::get('/dashboard', [ProductoController::class, 'proveedorDashboard'])->middleware('auth:proveedor')->name('proveedor.dashboard');
});

/* === Gestión de productos de proveedores === */
Route::prefix('proveedor/productos')->middleware('auth:proveedor')->group(function () {
    Route::get('/', [ProductoController::class, 'index']);
    Route::post('/', [ProductoController::class, 'store']);
    Route::get('/{id}', [ProductoController::class, 'show']);
    Route::put('/{id}', [ProductoController::class, 'update']);
    Route::delete('/{id}', [ProductoController::class, 'destroy']);
});

/* === Categorías para proveedores === */
Route::post('/proveedor/categorias', [CategoriaProductoController::class, 'storeCategoria'])->middleware('auth:proveedor')->name('proveedor.categorias.store');

/* ==================== VISTAS COMUNES ==================== */
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
