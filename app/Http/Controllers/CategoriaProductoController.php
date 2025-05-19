<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class CategoriaProductoController extends Controller
{
    /* 🚀 Obtener todas las categorías */
    public function index()
    {
        return CategoriaProducto::all();
    }

    /* 🚀 Crear una nueva categoría desde cualquier punto */
    public function store(Request $request)
    {
        return CategoriaProducto::create($request->all());
    }

    /* 🚀 Obtener una categoría específica */
    public function show($id)
    {
        return CategoriaProducto::findOrFail($id);
    }

    /* 🚀 Actualizar una categoría existente */
    public function update(Request $request, $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->update($request->all());
        return $categoria;
    }

    /* 🚀 Eliminar una categoría */
    public function destroy($id)
    {
        return CategoriaProducto::destroy($id);
    }

    /* 🚀 Registrar una nueva categoría desde el dashboard del proveedor */
    public function storeCategoria(Request $request)
    {
        $request->validate([
            'Nombre_Categoria' => 'required|string|max:100|unique:categorias_productos,Nombre_Categoria',
        ]);

        CategoriaProducto::create([
            'Nombre_Categoria' => $request->Nombre_Categoria,
        ]);

        return redirect()->route('proveedor.dashboard')->with('success', 'Categoría registrada correctamente.');
    }
}