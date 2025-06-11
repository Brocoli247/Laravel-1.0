<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;

class OrdenController extends Controller
{
    public function procesarCompra(Request $request)
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return redirect()->route('checkout')->withErrors('Usuario no válido');

        $validated = $request->validate([
            'direccion_id' => 'required|exists:direcciones,ID_Direccion',
            'tarjeta_id' => 'required|exists:tarjetas_credito,ID_Tarjeta',
        ]);

        $carrito = \App\Models\Carrito::where('ID_Cliente', $clienteId)->with('producto')->get();
        if ($carrito->isEmpty()) {
            return redirect()->route('carrito')->withErrors('El carrito está vacío');
        }

        $subtotal = 0;
        foreach ($carrito as $item) {
            $subtotal += ($item->producto->Precio ?? 0) * $item->Cantidad;
        }
        $envio = ($subtotal >= 300) ? 0 : 150;
        $total = $subtotal + $envio;

        \DB::beginTransaction();
        try {
            // Crear la orden
            $orden = \App\Models\Orden::create([
                'ID_Cliente' => $clienteId,
                'Total' => $total,
                'Fecha' => now(),
            ]);
            // Crear detalles de la orden y actualizar stock
            foreach ($carrito as $item) {
                $producto = $item->producto;
                \App\Models\DetalleOrden::create([
                    'ID_Orden' => $orden->ID_Orden,
                    'ID_Producto' => $producto->ID_Producto,
                    'Cantidad' => $item->Cantidad,
                    'Subtotal' => ($producto->precio ?? $producto->Precio) * $item->Cantidad,
                ]);
                // Actualizar stock
                $producto->cantidad = max(0, $producto->cantidad - $item->Cantidad);
                $producto->save();
            }
            // Vaciar carrito
            \App\Models\Carrito::where('ID_Cliente', $clienteId)->delete();
            \DB::commit();
            return redirect()->route('carrito')->with('success', '¡Compra realizada con éxito! Puedes ver tu pedido en el historial.');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('checkout')->withErrors('Error al procesar la compra: ' . $e->getMessage());
        }
    }
    // Historial de pedidos del cliente autenticado
    public function historial()
    {
        $cliente = session('cliente');
        $clienteId = $cliente['ID_Cliente'] ?? null;
        if (!$clienteId) return redirect('/login');
        $ordenes = \App\Models\Orden::with('detalles.producto')
            ->where('ID_Cliente', $clienteId)
            ->orderBy('Fecha', 'desc')
            ->get();
        return view('historial', compact('ordenes'));
    }

    public function store(Request $request)
    {
        return Orden::create($request->all()); // Crea una nueva orden
    }

    public function show($id)
    {
        return Orden::findOrFail($id); // Obtiene una orden específica
    }

    public function update(Request $request, $id)
    {
        $orden = Orden::findOrFail($id);
        $orden->update($request->all());
        return $orden; // Actualiza los datos de la orden
    }

    public function destroy($id)
    {
        return Orden::destroy($id); // Elimina una orden
    }
}