<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Proveedor;

class ProveedorAuthController extends Controller
{
    // MOSTRAR FORMULARIO DE REGISTRO
    public function showRegisterForm()
    {
        return view('proveedor_register');
    }

    // REGISTRO DE PROVEEDOR
    public function register(Request $request)
    {
        $request->validate([
            'Nombre_Proveedor' => 'required|string|max:100',
            'Correo_Electronico' => 'required|email|unique:proveedores',
            'password' => 'required|min:6|confirmed'
        ]);

        $proveedor = Proveedor::create([
            'Nombre_Proveedor' => $request->Nombre_Proveedor,
            'Correo_Electronico' => $request->Correo_Electronico,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('proveedor.login')->with('success', 'Registro exitoso, ahora inicia sesión.');
    }

    // MOSTRAR FORMULARIO DE LOGIN
    public function showLoginForm()
    {
        return view('proveedor_login');
    }

    // INICIO DE SESIÓN
    public function login(Request $request)
    {
        $request->validate([
            'Correo_Electronico' => 'required|email',
            'password' => 'required'
        ]);

        $proveedor = Proveedor::where('Correo_Electronico', $request->Correo_Electronico)->first();

        if (!$proveedor || !Hash::check($request->password, $proveedor->password)) {
            return back()->withErrors(['error_message' => 'Correo o contraseña incorrectos.'])->withInput();
        }

        // Guardar ID del proveedor en la sesión
        Session::put('proveedor_id', $proveedor->id);

        return redirect()->route('proveedor.dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    // CERRAR SESIÓN
    public function logout()
    {
        Session::forget('proveedor_id');
        return redirect()->route('proveedor.login')->with('success', 'Sesión cerrada correctamente.');
    }

    // PANEL DEL PROVEEDOR
    public function dashboard()
    {
        $proveedorId = Session::get('proveedor_id');

        if (!$proveedorId) {
            return redirect()->route('proveedor.login')->withErrors(['error_message' => 'Debes iniciar sesión.']);
        }

        $proveedor = Proveedor::find($proveedorId);
        $productos = $proveedor->productos ?? collect();

        return view('proveedor_dashboard', compact('productos'));
    }
}
