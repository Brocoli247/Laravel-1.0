<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;

class OrdenController extends Controller
{
    public function index()
    {
        return Orden::all(); // Obtiene todas las órdenes
    }

    public function store(Request $request)
    {
        return Orden::create($request->all()); // Crea una nueva orden
    }

    public function show($id)
    {
        return Orden::findOrFail($id); // Obtiene una orden específica
    }

    public function update(Request $request, $id)
    {
        $orden = Orden::findOrFail($id);
        $orden->update($request->all());
        return $orden; // Actualiza los datos de la orden
    }

    public function destroy($id)
    {
        return Orden::destroy($id); // Elimina una orden
    }
}