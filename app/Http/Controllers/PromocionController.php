<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion;

class PromocionController extends Controller
{
    public function index()
    {
        return Promocion::all(); // Obtiene todas las promociones
    }

    public function store(Request $request)
    {
        return Promocion::create($request->all()); // Crea una nueva promoción
    }

    public function show($id)
    {
        return Promocion::findOrFail($id); // Obtiene una promoción específica
    }

    public function update(Request $request, $id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->update($request->all());
        return $promocion; // Actualiza los datos de la promoción
    }

    public function destroy($id)
    {
        return Promocion::destroy($id); // Elimina una promoción
    }
}
