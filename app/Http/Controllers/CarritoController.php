<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class CarritoController extends Controller
{
    public function index()
    {
        return Carrito::all(); // Obtiene todos los carritos de compra
    }

    public function store(Request $request)
    {
        return Carrito::create($request->all()); // Agrega un producto al carrito
    }

    public function show($id)
    {
        return Carrito::findOrFail($id); // Obtiene un carrito específico
    }

    public function update(Request $request, $id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->update($request->all());
        return $carrito; // Actualiza los datos del carrito
    }

    public function destroy($id)
    {
        return Carrito::destroy($id); // Elimina un carrito de compra
    }
}
