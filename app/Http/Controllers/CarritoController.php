<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class CarritoController extends Controller
{
    public function index()
    {
        $cliente = session('cliente');
        if (!$cliente) return redirect('/login');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return [];
        // Obtener el carrito del usuario con detalles de producto
        $carrito = Carrito::where('ID_Cliente', $clienteId)
            ->with('producto')
            ->get();
        return $carrito;
    }

    public function store(Request $request)
    {
        $cliente = session('cliente');
        if (!$cliente) return redirect('/login');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return response()->json(['error'=>'No autorizado'], 403);
        $validated = $request->validate([
            'ID_Producto' => 'required|exists:productos,ID_Producto',
            'Cantidad' => 'required|integer|min:1',
        ]);
        // Revisar si el producto ya está en el carrito
        $carritoItem = Carrito::where('ID_Cliente', $clienteId)
            ->where('ID_Producto', $validated['ID_Producto'])
            ->first();
        if ($carritoItem) {
            // Si ya existe, solo actualizar la cantidad
            $carritoItem->Cantidad += $validated['Cantidad'];
            $carritoItem->save();
        } else {
            Carrito::create([
                'ID_Cliente' => $clienteId,
                'ID_Producto' => $validated['ID_Producto'],
                'Cantidad' => $validated['Cantidad'],
            ]);
        }
        return redirect()->back()->with('success','Producto agregado al carrito');
    }

    public function show($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $carrito = Carrito::where('ID_Carrito', $id)->where('ID_Cliente', $clienteId)->with('producto')->firstOrFail();
        return $carrito;
    }

    public function update(Request $request, $id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $carrito = Carrito::where('ID_Carrito', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        $validated = $request->validate([
            'Cantidad' => 'required|integer|min:1',
        ]);
        $carrito->Cantidad = $validated['Cantidad'];
        $carrito->save();
        return redirect()->back()->with('success','Cantidad actualizada');
    }

    public function destroy($id)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        $carrito = Carrito::where('ID_Carrito', $id)->where('ID_Cliente', $clienteId)->firstOrFail();
        $carrito->delete();
        return redirect()->back()->with('success','Producto eliminado del carrito');
    }
}
