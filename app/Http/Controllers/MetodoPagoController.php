<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoPago;

class MetodoPagoController extends Controller
{
    public function index()
    {
        return MetodoPago::all(); // Obtiene todos los métodos de pago
    }

    public function store(Request $request)
    {
        return MetodoPago::create($request->all()); // Crea un nuevo método de pago
    }

    public function show($id)
    {
        return MetodoPago::findOrFail($id); // Obtiene un método de pago específico
    }

    public function update(Request $request, $id)
    {
        $metodoPago = MetodoPago::findOrFail($id);
        $metodoPago->update($request->all());
        return $metodoPago; // Actualiza los datos del método de pago
    }

    public function destroy($id)
    {
        return MetodoPago::destroy($id); // Elimina un método de pago
    }
}
