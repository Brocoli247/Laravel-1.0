<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;

class OpinionController extends Controller
{
    public function index()
    {
        return Opinion::all(); // Obtiene todas las opiniones
    }

    public function store(Request $request)
    {
        return Opinion::create($request->all()); // Crea una nueva opinión
    }

    public function show($id)
    {
        return Opinion::findOrFail($id); // Obtiene una opinión específica
    }

    public function update(Request $request, $id)
    {
        $opinion = Opinion::findOrFail($id);
        $opinion->update($request->all());
        return $opinion; // Actualiza los datos de la opinión
    }

    public function destroy($id)
    {
        return Opinion::destroy($id); // Elimina una opinión
    }
}
