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
        return view('proveedor_register'); // Vista específica para el registro de proveedores
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

        return redirect()->route('proveedor.login')->with('success', 'Registro exitoso, ahora inicia sesión.');
    }

    /* MOSTRAR FORMULARIO DE LOGIN */
    public function showLoginForm()
    {
        return view('proveedor_login'); // Vista específica para el login de proveedores
    }

    /* INICIO DE SESIÓN */
    public function login(Request $request)
    {
        $request->validate([
            'Correo_Electronico' => 'required|email',
            'password' => 'required'
        ]);

        Auth::shouldUse('proveedor'); // ✅ Forzar el uso del guard 'proveedor'

        $credenciales = [
            'Correo_Electronico' => $request->Correo_Electronico,
            'password' => $request->password,
        ];

        if (!Auth::guard('proveedor')->attempt($credenciales)) { // ✅ Validación con `attempt()`
            return back()->withErrors(['error_message' => 'Correo o contraseña incorrectos.'])->withInput();
        }

        return redirect()->route('proveedor.dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /* CERRAR SESIÓN */
    public function logout()
    {
        Auth::guard('proveedor')->logout();
        return redirect()->route('proveedor.login')->with('success', 'Sesión cerrada correctamente.');
    }

    /* PANEL DEL PROVEEDOR */
    public function dashboard()
    {
        $proveedor = Auth::guard('proveedor')->user(); // ✅ Obtener proveedor autenticado
        $productos = $proveedor->productos ?? collect(); // ✅ Manejar posibles casos sin productos

        return view('proveedor_dashboard', compact('productos')); // ✅ Enviar variable productos a la vista
    }
}