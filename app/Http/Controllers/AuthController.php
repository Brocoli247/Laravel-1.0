<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /** REGISTRO DE USUARIO */
    public function register(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Correo_Electronico' => 'required|email|unique:clientes|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $cliente = Cliente::create([
            'Nombre' => $request->Nombre,
            'Correo_Electronico' => $request->Correo_Electronico,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso, ahora puedes iniciar sesión.');
    }

    /** INICIO DE SESIÓN */
    public function login(Request $request)
    {
        $request->validate([
            'Correo_Electronico' => 'required|email',
            'password' => 'required'
        ]);

        $cliente = Cliente::where('Correo_Electronico', $request->Correo_Electronico)->first();

        if (!$cliente) {
            session()->flash('error_message', 'El correo ingresado no está registrado. Primero debes registrarte. <br><a href="' . url('/register') . '" class="btn btn-primary mt-2 d-block text-center">Crear cuenta</a>');
            return back()->withInput();
        }

        if (!Hash::check($request->password, $cliente->password)) {
            return back()->withErrors(['password' => 'La contraseña ingresada es incorrecta. Inténtalo nuevamente.'])->withInput();
        }

        // Iniciar sesión manualmente usando Session
        Session::put('cliente_id', $cliente->id);
        Session::put('cliente_nombre', $cliente->Nombre);

        return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /** CERRAR SESIÓN */
    public function logout()
    {
        // Eliminar datos de sesión
        Session::forget('cliente_id');
        Session::forget('cliente_nombre');
        Session::flush(); // Opcional: elimina toda la sesión

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}