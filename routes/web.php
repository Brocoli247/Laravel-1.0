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
use App\Http\Controllers\RecuperacionController;
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
    Route::get('/{id}/editar', [ProductoController::class, 'edit'])->name('proveedor.productos.edit');
    Route::put('/{id}', [ProductoController::class, 'update'])->name('proveedor.productos.update');
});

/* === Categorías para proveedores === */
Route::post('/proveedor/categorias', [CategoriaProductoController::class, 'storeCategoria'])->middleware('auth:proveedor')->name('proveedor.categorias.store');

/* ==================== VISTAS COMUNES ==================== */
// CRUD de carrito (solo para clientes autenticados)
Route::middleware(['VerificarUsuario'])->group(function () {
    Route::get('/carrito', function () {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $carrito = $clienteId ? \App\Models\Carrito::where('ID_Cliente', $clienteId)->with('producto')->get() : collect();
        return view('carrito', compact('carrito'));
    })->name('carrito');
    Route::post('/carrito', [CarritoController::class, 'store'])->name('carrito.store');
    Route::put('/carrito/{id}', [CarritoController::class, 'update'])->name('carrito.update');
    Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');

    // Checkout
    Route::get('/checkout', function () {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $carrito = $clienteId ? \App\Models\Carrito::where('ID_Cliente', $clienteId)->with('producto')->get() : collect();
        $direcciones = $clienteId ? \App\Models\Direccion::where('ID_Cliente', $clienteId)->get() : collect();
        $tarjetas = $clienteId ? \App\Models\TarjetaCredito::where('ID_Cliente', $clienteId)->get() : collect();
        return view('checkout', compact('carrito', 'direcciones', 'tarjetas'));
    })->name('checkout');
    Route::post('/checkout', [\App\Http\Controllers\OrdenController::class, 'procesarCompra'])->name('checkout.process');

    // Historial de pedidos
    Route::get('/historial', [\App\Http\Controllers\OrdenController::class, 'historial'])->name('historial');
});

// Recuperación de contraseña CLIENTE
Route::get('/recuperar/cliente/email', [RecuperacionController::class, 'showEmailFormCliente'])->name('recuperar.cliente.email');
Route::post('/recuperar/cliente/email', [RecuperacionController::class, 'verificarEmailCliente'])->name('recuperar.cliente.email.post');
Route::get('/recuperar/cliente/password/{email}', [RecuperacionController::class, 'showPasswordFormCliente'])->name('recuperar.cliente.password');
Route::post('/recuperar/cliente/password/{email}', [RecuperacionController::class, 'actualizarPasswordCliente'])->name('recuperar.cliente.password.post');

// Recuperación de contraseña PROVEEDOR
Route::get('/recuperar/proveedor/email', [RecuperacionController::class, 'showEmailFormProveedor'])->name('recuperar.proveedor.email');
Route::post('/recuperar/proveedor/email', [RecuperacionController::class, 'verificarEmailProveedor'])->name('recuperar.proveedor.email.post');
Route::get('/recuperar/proveedor/password/{email}', [RecuperacionController::class, 'showPasswordFormProveedor'])->name('recuperar.proveedor.password');
Route::post('/recuperar/proveedor/password/{email}', [RecuperacionController::class, 'actualizarPasswordProveedor'])->name('recuperar.proveedor.password.post');

// CRUD de tarjetas de crédito (solo para clientes autenticados)
Route::middleware(['VerificarUsuario'])->group(function () {
    Route::get('/tarjetas', function () {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $tarjetas = $clienteId ? \App\Models\TarjetaCredito::where('ID_Cliente', $clienteId)->get() : collect();
        return view('tarjetas', compact('tarjetas'));
    })->name('tarjetas');
    Route::post('/tarjetas', [TarjetaCreditoController::class, 'store'])->name('tarjetas.store');
    Route::delete('/tarjetas/{id}', [TarjetaCreditoController::class, 'destroy'])->name('tarjetas.destroy');
    // Editar tarjeta
    Route::get('/tarjetas/{id}/editar', [TarjetaCreditoController::class, 'edit'])->name('tarjetas.edit');
    Route::put('/tarjetas/{id}', [TarjetaCreditoController::class, 'update'])->name('tarjetas.update');
    // Opcional: rutas para editar/actualizar tarjetas si se implementa
});

Route::get('/datos-personales', function () {
    return view('datos_personales');
})->name('datos.personales');

Route::post('/datos-personales', [App\Http\Controllers\ClienteController::class, 'updateDatosPersonales'])
    ->middleware('VerificarUsuario')
    ->name('datos.personales.update');

// CRUD de direcciones (solo para clientes autenticados)
Route::middleware(['VerificarUsuario'])->group(function () {
    Route::get('/direcciones', function () {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $direcciones = $clienteId ? \App\Models\Direccion::where('ID_Cliente', $clienteId)->get() : collect();
        return view('direcciones', compact('direcciones'));
    })->name('direcciones');
    Route::post('/direcciones', [DireccionController::class, 'store'])->name('direcciones.store');
    Route::delete('/direcciones/{id}', [DireccionController::class, 'destroy'])->name('direcciones.destroy');
    // Editar dirección
    Route::get('/direcciones/{id}/editar', [DireccionController::class, 'edit'])->name('direcciones.edit');
    Route::put('/direcciones/{id}', [DireccionController::class, 'update'])->name('direcciones.update');
    // Opcional: rutas para editar/actualizar direcciones si se implementa
});
