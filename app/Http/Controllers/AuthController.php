<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

        Auth::login($cliente);

        /*
        // Si estás usando sesión manual:
        // Session::put('cliente', $cliente);

        // if ($request->filled('r')) {
        //     try {
        //         $urlDestino = decrypt($request->input('r'));
        //         return redirect($urlDestino)->with('success', 'Inicio de sesión exitoso.');
        //     } catch (\Exception $e) {
        //         // Si falla el decrypt, continúa al dashboard
        //     }
        // }
        */

        return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /** CERRAR SESIÓN */
    public function logout()
    {
        Auth::logout();

        /*
        // Si estás usando sesión manual:
        // Session::forget('cliente');
        */

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
