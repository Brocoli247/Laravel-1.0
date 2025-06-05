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
            'Correo_Electronico' => 'required|email|unique:clientes,Correo_Electronico|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        Cliente::create([
            'Nombre' => $request->Nombre,
            'Correo_Electronico' => $request->Correo_Electronico,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    /** INICIO DE SESIÓN */
    public function login(Request $request)
    {
        $request->validate([
            'Correo_Electronico' => 'required|email',
            'password' => 'required',
        ]);

        $cliente = Cliente::where('Correo_Electronico', $request->Correo_Electronico)->first();

        if (!$cliente) {
            return back()->withErrors([
                'Correo_Electronico' => 'El correo no está registrado. <a href="' . url('/register') . '" class="btn btn-link">¿Crear cuenta?</a>'
            ])->withInput();
        }

        if (!Hash::check($request->password, $cliente->password)) {
            return back()->withErrors([
                'password' => 'La contraseña es incorrecta.'
            ])->withInput();
        }

        // Autenticación exitosa
        Session::put('cliente', $cliente);

        // Si viene un redirect cifrado (parámetro 'r'), redirigir ahí
        if ($request->filled('r')) {
            try {
                $urlDestino = decrypt($request->input('r'));
                return redirect($urlDestino)->with('success', 'Inicio de sesión exitoso.');
            } catch (\Exception $e) {
                // En caso de fallo al desencriptar, ir al dashboard
            }
        }

        return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /** CERRAR SESIÓN */
    public function logout()
    {
        Session::forget('cliente');

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
