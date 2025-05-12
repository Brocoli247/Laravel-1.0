<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleOrden;

class DetalleOrdenController extends Controller
{
    public function index()
    {
        return DetalleOrden::all(); // Obtiene todos los detalles de órdenes
    }

    public function store(Request $request)
    {
        return DetalleOrden::create($request->all()); // Crea un nuevo detalle de orden
    }

    public function show($id)
    {
        return DetalleOrden::findOrFail($id); // Obtiene un detalle específico
    }

    public function update(Request $request, $id)
    {
        $detalleOrden = DetalleOrden::findOrFail($id);
        $detalleOrden->update($request->all());
        return $detalleOrden; // Actualiza los datos del detalle de orden
    }

    public function destroy($id)
    {
        return DetalleOrden::destroy($id); // Elimina un detalle de orden
    }
}
