<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto; // ✅ Importamos el modelo de categorías
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /* 🚀 Mostrar todos los productos sin importar el proveedor */
    public function index()
    {
        // ✅ Obtener todos los productos de la tabla `productos`
        $productos = Producto::all();

        // ✅ Pasar los productos a la vista `dashboard.blade.php`
        return view('dashboard', compact('productos'));
    }

    /* 🚀 Mostrar productos del proveedor autenticado en su dashboard */
    public function proveedorDashboard()
    {
        // ✅ Obtener el proveedor autenticado
        $proveedor = Auth::guard('proveedor')->user();

        // ✅ Verificar si el proveedor está autenticado
        if (!$proveedor) {
            return redirect('/proveedor/login')->with('error', 'Debes iniciar sesión.');
        }

        // ✅ Obtener productos del proveedor autenticado
        $productos = Producto::where('ID_Proveedor', $proveedor->ID_Proveedor)->get();

        // ✅ Obtener todas las categorías disponibles
        $categorias = CategoriaProducto::all();

        // ✅ Pasar los productos y categorías a la vista
        return view('proveedor_dashboard', compact('productos', 'categorias'));
    }

    /* 🚀 Registrar un nuevo producto */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
            'ID_Categoria' => 'required|exists:categorias_productos,ID_Categoria',
            'ID_Proveedor' => 'required|exists:proveedores,ID_Proveedor',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'ID_Categoria' => $request->ID_Categoria, // ✅ Ahora se almacena el ID seleccionado en el formulario
            'ID_Proveedor' => $request->ID_Proveedor,
        ]);

        // ✅ Redirigir correctamente al proveedor al dashboard tras registrar el producto
        return redirect()->route('proveedor.dashboard')->with('success', 'Producto registrado correctamente.');
    }

    /* Obtener un producto específico */
    public function show($id)
    {
        return Producto::findOrFail($id);
    }

    /* Actualizar un producto */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|max:100',
            'descripcion' => 'string',
            'precio' => 'numeric|min:0',
            'cantidad' => 'integer|min:1',
            'ID_Categoria' => 'exists:categorias_productos,ID_Categoria',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('proveedor.dashboard')->with('success', 'Producto actualizado correctamente.');
    }

    /* Eliminar un producto */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('proveedor.dashboard')->with('success', 'Producto eliminado correctamente.');
    }
}