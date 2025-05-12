<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all(); // Obtiene todos los clientes
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Correo_Electronico' => 'required|email|unique:clientes',
            'password' => 'required|min:6'
        ]);

        return Cliente::create($request->all()); // Guarda un nuevo cliente
    }

    public function show($id)
    {
        return Cliente::findOrFail($id); // Obtiene un cliente específico
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente; // Actualiza los datos del cliente
    }

    public function destroy($id)
    {
        return Cliente::destroy($id); // Elimina un cliente
    }
}