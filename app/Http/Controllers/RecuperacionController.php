<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;
use App\Models\Proveedor;

class RecuperacionController extends Controller
{
    // Formulario para ingresar email (cliente)
    public function showEmailFormCliente()
    {
        return view('auth.recuperar_email_cliente');
    }

    // Procesar email (cliente)
    public function verificarEmailCliente(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $cliente = Cliente::where('Correo_Electronico', $request->email)->first();
        if (!$cliente) {
            return back()->withErrors(['email' => 'El correo no está registrado.']);
        }
        // Redirigir al formulario de nueva contraseña
        return redirect()->route('recuperar.cliente.password', ['email' => $request->email]);
    }

    // Formulario para nueva contraseña (cliente)
    public function showPasswordFormCliente($email)
    {
        $cliente = Cliente::where('Correo_Electronico', $email)->first();
        if (!$cliente) {
            return redirect()->route('recuperar.cliente.email')->withErrors(['email' => 'El correo no está registrado.']);
        }
        return view('auth.recuperar_password_cliente', compact('email'));
    }

    // Procesar nueva contraseña (cliente)
    public function actualizarPasswordCliente(Request $request, $email)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $cliente = Cliente::where('Correo_Electronico', $email)->first();
        if (!$cliente) {
            return redirect()->route('recuperar.cliente.email')->withErrors(['email' => 'El correo no está registrado.']);
        }
        $cliente->password = Hash::make($request->password);
        $cliente->save();
        return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente. Ahora puedes iniciar sesión.');
    }

    // Formulario para ingresar email (proveedor)
    public function showEmailFormProveedor()
    {
        return view('auth.recuperar_email_proveedor');
    }

    // Procesar email (proveedor)
    public function verificarEmailProveedor(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $proveedor = Proveedor::where('Correo_Electronico', $request->email)->first();
        if (!$proveedor) {
            return back()->withErrors(['email' => 'El correo no está registrado.']);
        }
        // Redirigir al formulario de nueva contraseña
        return redirect()->route('recuperar.proveedor.password', ['email' => $request->email]);
    }

    // Formulario para nueva contraseña (proveedor)
    public function showPasswordFormProveedor($email)
    {
        $proveedor = Proveedor::where('Correo_Electronico', $email)->first();
        if (!$proveedor) {
            return redirect()->route('recuperar.proveedor.email')->withErrors(['email' => 'El correo no está registrado.']);
        }
        return view('auth.recuperar_password_proveedor', compact('email'));
    }

    // Procesar nueva contraseña (proveedor)
    public function actualizarPasswordProveedor(Request $request, $email)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $proveedor = Proveedor::where('Correo_Electronico', $email)->first();
        if (!$proveedor) {
            return redirect()->route('recuperar.proveedor.email')->withErrors(['email' => 'El correo no está registrado.']);
        }
        $proveedor->password = Hash::make($request->password);
        $proveedor->save();
        return redirect()->route('proveedor.login')->with('success', 'Contraseña actualizada correctamente. Ahora puedes iniciar sesión.');
    }
}
