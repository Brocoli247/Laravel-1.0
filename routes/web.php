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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas de la aplicación.
| Son cargadas por RouteServiceProvider dentro del grupo "web".
|
*/

Route::get('/', function () {
    return view('welcome'); // Página principal
});

/* Rutas para Clientes */
Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index']);
    Route::post('/', [ClienteController::class, 'store']);
    Route::get('/{id}', [ClienteController::class, 'show']);
    Route::put('/{id}', [ClienteController::class, 'update']);
    Route::delete('/{id}', [ClienteController::class, 'destroy']);
});

/* Rutas para Autenticación */
Route::get('/register', function () {
    return view('auth.register'); // Vista del registro
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

/* Ruta POST para procesar el registro */
Route::post('/register', [AuthController::class, 'register']);

/* Ruta POST para procesar el login */
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

/* Ruta para el dashboard después del inicio de sesión */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/* Ruta para cerrar sesión */
Route::post('/logout', [AuthController::class, 'logout']);