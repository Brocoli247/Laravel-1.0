<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;

class DireccionController extends Controller
{
    public function edit($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $direccion = \App\Models\Direccion::where('ID_Direccion', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        return view('edit_direccion', compact('direccion'));
    }

    public function index()
    {
        $cliente = session('cliente');
        if (!$cliente) return redirect('/login');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return [];
        return Direccion::where('ID_Cliente', $clienteId)->get();
    }

    public function store(Request $request)
    {
        $cliente = session('cliente');
        if (!$cliente) return redirect('/login');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return response()->json(['error'=>'No autorizado'], 403);
        $validated = $request->validate([
            'Estado' => 'required|string|max:50',
            'Municipio' => 'required|string|max:50',
            'Colonia' => 'required|string|max:50',
            'Calle' => 'required|string|max:100',
            'Numero_Ext' => 'required|string|max:10',
            'Numero_Int' => 'nullable|string|max:10',
            'Codigo_Postal' => 'required|string|max:10',
        ]);
        $validated['ID_Cliente'] = $clienteId;
        Direccion::create($validated);
        return redirect()->back()->with('success','Dirección registrada correctamente');
    }

    public function show($id)
    {
        $user = auth()->user();
        $clienteId = $user->ID_Cliente ?? $user->cliente->ID_Cliente ?? null;
        $direccion = Direccion::where('ID_Direccion', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        return $direccion;
    }

    public function update(Request $request, $id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $direccion = Direccion::where('ID_Direccion', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        $validated = $request->validate([
            'Estado' => 'required|string|max:50',
            'Municipio' => 'required|string|max:50',
            'Colonia' => 'required|string|max:50',
            'Calle' => 'required|string|max:100',
            'Numero_Ext' => 'required|string|max:10',
            'Numero_Int' => 'nullable|string|max:10',
            'Codigo_Postal' => 'required|string|max:10',
        ]);
        $direccion->update($validated);
        return redirect()->route('direcciones')->with('success','Dirección actualizada correctamente');
    }

    public function destroy($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $direccion = Direccion::where('ID_Direccion', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        $direccion->delete();
        return redirect()->back()->with('success','Dirección eliminada correctamente');
    }
}
