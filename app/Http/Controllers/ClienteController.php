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

    // Actualiza los datos personales del cliente autenticado
    public function updateDatosPersonales(Request $request)
    {
        $cliente = session('cliente');
        if (!$cliente) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión.');
        }
        $id = $cliente['ID_Cliente'];
        $validated = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellido_Paterno' => 'required|string|max:255',
            'Apellido_Materno' => 'nullable|string|max:255',
            'Telefono' => 'required|string|max:30',
        ]);
        $clienteModel = \App\Models\Cliente::findOrFail($id);
        $clienteModel->update($validated);
        // Actualizar la sesión con los nuevos datos
        foreach ($validated as $key => $value) {
            $cliente[$key] = $value;
        }
        session(['cliente' => $cliente]);
        return redirect()->route('datos.personales')->with('success', 'Datos personales actualizados correctamente.');
    }
}