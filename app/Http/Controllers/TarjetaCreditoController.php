<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarjetaCredito;

class TarjetaCreditoController extends Controller
{
    public function edit($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $tarjeta = \App\Models\TarjetaCredito::where('ID_Tarjeta', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        return view('edit_tarjeta', compact('tarjeta'));
    }

    public function index()
    {
        $cliente = session('cliente');
        if (!$cliente) return redirect('/login');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return [];
        return TarjetaCredito::where('ID_Cliente', $clienteId)->get();
    }

    public function store(Request $request)
    {
        $cliente = session('cliente');
        if (!$cliente) return redirect('/login');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return response()->json(['error'=>'No autorizado'], 403);
        $validated = $request->validate([
            'Numero_Tarjeta' => 'required|string|min:13|max:19',
            'Fecha_Expiracion' => 'required', // validaremos manualmente el formato
            'CVV' => 'required|string|min:3|max:4',
            'Tipo_Tarjeta' => 'required|string|max:50',
        ]);
        // Convertir YYYY-MM a YYYY-MM-01 para guardar como DATE
        if (preg_match('/^\d{4}-\d{2}$/', $validated['Fecha_Expiracion'])) {
            $validated['Fecha_Expiracion'] .= '-01';
        }
        $validated['ID_Cliente'] = $clienteId;
        $tarjeta = TarjetaCredito::create($validated);
        return redirect()->back()->with('success','Tarjeta registrada correctamente');
    }

    public function show($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $tarjeta = TarjetaCredito::where('ID_Tarjeta', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        return $tarjeta;
    }

    public function update(Request $request, $id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $tarjeta = TarjetaCredito::where('ID_Tarjeta', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        $validated = $request->validate([
            'Numero_Tarjeta' => 'required|string|min:13|max:19',
            'Fecha_Expiracion' => 'required', // validaremos manualmente el formato
            'CVV' => 'required|string|min:3|max:4',
            'Tipo_Tarjeta' => 'required|string|max:50',
        ]);
        // Convertir YYYY-MM a YYYY-MM-01 para guardar como DATE
        if (preg_match('/^\d{4}-\d{2}$/', $validated['Fecha_Expiracion'])) {
            $validated['Fecha_Expiracion'] .= '-01';
        }
        $tarjeta->update($validated);
        return redirect('/tarjetas')->with('success','Tarjeta actualizada correctamente');
    }

    public function destroy($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $tarjeta = TarjetaCredito::where('ID_Tarjeta', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        $tarjeta->delete();
        return redirect()->back()->with('success','Tarjeta eliminada correctamente');
    }
}
