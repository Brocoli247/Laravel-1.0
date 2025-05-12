<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class CategoriaProductoController extends Controller
{
    public function index()
    {
        return CategoriaProducto::all(); // Obtiene todas las categorías
    }

    public function store(Request $request)
    {
        return CategoriaProducto::create($request->all()); // Crea una nueva categoría
    }

    public function show($id)
    {
        return CategoriaProducto::findOrFail($id); // Obtiene una categoría específica
    }

    public function update(Request $request, $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->update($request->all());
        return $categoria; // Actualiza los datos de la categoría
    }

    public function destroy($id)
    {
        return CategoriaProducto::destroy($id); // Elimina una categoría
    }
}