<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;

class DireccionController extends Controller
{
    public function index()
    {
        return Direccion::all(); // Obtiene todas las direcciones
    }

    public function store(Request $request)
    {
        return Direccion::create($request->all()); // Crea una nueva dirección
    }

    public function show($id)
    {
        return Direccion::findOrFail($id); // Obtiene una dirección específica
    }

    public function update(Request $request, $id)
    {
        $direccion = Direccion::findOrFail($id);
        $direccion->update($request->all());
        return $direccion; // Actualiza los datos de la dirección
    }

    public function destroy($id)
    {
        return Direccion::destroy($id); // Elimina una dirección
    }
}
