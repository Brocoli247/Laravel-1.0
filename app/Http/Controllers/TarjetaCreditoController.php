<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarjetaCredito;

class TarjetaCreditoController extends Controller
{
    public function index()
    {
        return TarjetaCredito::all(); // Obtiene todas las tarjetas de crédito
    }

    public function store(Request $request)
    {
        return TarjetaCredito::create($request->all()); // Crea una nueva tarjeta de crédito
    }

    public function show($id)
    {
        return TarjetaCredito::findOrFail($id); // Obtiene una tarjeta específica
    }

    public function update(Request $request, $id)
    {
        $tarjeta = TarjetaCredito::findOrFail($id);
        $tarjeta->update($request->all());
        return $tarjeta; // Actualiza los datos de la tarjeta
    }

    public function destroy($id)
    {
        return TarjetaCredito::destroy($id); // Elimina una tarjeta de crédito
    }
}
