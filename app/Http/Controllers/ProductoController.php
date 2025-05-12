<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::all(); // Obtiene todos los productos
    }

    public function store(Request $request)
    {
        return Producto::create($request->all()); // Crea un nuevo producto
    }

    public function show($id)
    {
        return Producto::findOrFail($id); // Obtiene un producto específico
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return $producto; // Actualiza los datos del producto
    }

    public function destroy($id)
    {
        return Producto::destroy($id); // Elimina un producto
    }
}