<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        return Proveedor::all(); // Obtiene todos los proveedores
    }

    public function store(Request $request)
    {
        return Proveedor::create($request->all()); // Crea un nuevo proveedor
    }

    public function show($id)
    {
        return Proveedor::findOrFail($id); // Obtiene un proveedor específico
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return $proveedor; // Actualiza los datos del proveedor
    }

    public function destroy($id)
    {
        return Proveedor::destroy($id); // Elimina un proveedor
    }
}