<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Proveedor;

class ProveedorAuthController extends Controller
{
    /* MOSTRAR FORMULARIO DE REGISTRO */
    public function showRegisterForm()
    {
        return view('proveedor.register'); // ✅ Vista en resources/views/proveedor/register.blade.php
    }

    /* REGISTRO DE PROVEEDOR */
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

        // ✅ Redirige automáticamente a la vista de login del proveedor con mensaje
        return redirect()->route('proveedor.login')->with('success', 'Registro exitoso. Ahora inicia sesión.');
    }

    /* MOSTRAR FORMULARIO DE LOGIN */
    public function showLoginForm()
    {
        return view('proveedor_login'); // ✅ Vista en resources/views/proveedor/login.blade.php
    }

    /* INICIO DE SESIÓN DE PROVEEDOR */
    public function login(Request $request)
    {
        $request->validate([
            'Correo_Electronico' => 'required|email',
            'password' => 'required'
        ]);

        Auth::shouldUse('proveedor'); // ✅ Usa el guard "proveedor"

        $credenciales = [
            'Correo_Electronico' => $request->Correo_Electronico,
            'password' => $request->password,
        ];

        if (!Auth::guard('proveedor')->attempt($credenciales)) {
            return back()->withErrors(['error_message' => 'Correo o contraseña incorrectos.'])->withInput();
        }

        return redirect()->route('proveedor.dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /* CERRAR SESIÓN DE PROVEEDOR */
    public function logout()
    {
        Auth::guard('proveedor')->logout();
        return redirect()->route('proveedor.login')->with('success', 'Sesión cerrada correctamente.');
    }

    /* DASHBOARD DEL PROVEEDOR */
    public function dashboard()
    {
        $proveedor = Auth::guard('proveedor')->user();
        $productos = $proveedor->productos ?? collect();

        return view('proveedor.dashboard', compact('productos'));
    }
}
