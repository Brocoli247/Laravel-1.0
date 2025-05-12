<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;

class PagoController extends Controller
{
    public function index()
    {
        return Pago::all(); // Obtiene todos los pagos
    }

    public function store(Request $request)
    {
        return Pago::create($request->all()); // Crea un nuevo pago
    }

    public function show($id)
    {
        return Pago::findOrFail($id); // Obtiene un pago específico
    }

    public function update(Request $request, $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->update($request->all());
        return $pago; // Actualiza los datos del pago
    }

    public function destroy($id)
    {
        return Pago::destroy($id); // Elimina un pago
    }
}
