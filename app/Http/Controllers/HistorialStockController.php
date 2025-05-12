<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialStock;

class HistorialStockController extends Controller
{
    public function index()
    {
        return HistorialStock::all(); // Obtiene todos los registros de historial de stock
    }

    public function store(Request $request)
    {
        return HistorialStock::create($request->all()); // Crea un nuevo registro de stock
    }

    public function show($id)
    {
        return HistorialStock::findOrFail($id); // Obtiene un registro específico
    }

    public function update(Request $request, $id)
    {
        $historial = HistorialStock::findOrFail($id);
        $historial->update($request->all());
        return $historial; // Actualiza los datos del historial
    }

    public function destroy($id)
    {
        return HistorialStock::destroy($id); // Elimina un registro de historial de stock
    }
}
