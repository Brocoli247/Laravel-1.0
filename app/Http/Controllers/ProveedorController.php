<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto;

class ProveedorController extends Controller
{
    /* PANEL DEL PROVEEDOR */
    public function dashboard()
    {
        $productos = Producto::all();
        $categorias = CategoriaProducto::all();

        return view('proveedor_dashboard', compact('productos', 'categorias'));
    }

    /* GUARDAR UN NUEVO PRODUCTO */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
            'ID_Categoria' => 'required|exists:categorias_productos,ID_Categoria',
            'ID_Proveedor' => 'required|exists:proveedores,ID_Proveedor', // ✅ Validamos que el proveedor exista
        ]);

        // ✅ Mostrar los datos enviados antes de guardarlos
        dd($request->all());

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'ID_Categoria' => $request->ID_Categoria,
            'ID_Proveedor' => $request->ID_Proveedor,
        ]);

        return redirect('/proveedor/dashboard')->with('success', 'Producto registrado correctamente.');
    }

    /* EDITAR PRODUCTO */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = CategoriaProducto::all();
        return view('proveedor_producto_edit', compact('producto', 'categorias'));
    }

    /* ACTUALIZAR PRODUCTO */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
            'ID_Categoria' => 'required|exists:categorias_productos,ID_Categoria',
        ]);

        $producto->update($request->all());

        return redirect('/proveedor/dashboard')->with('success', 'Producto actualizado correctamente.');
    }

    /* ELIMINAR PRODUCTO */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('/proveedor/dashboard')->with('success', 'Producto eliminado correctamente.');
    }
}