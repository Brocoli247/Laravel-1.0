<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProveedorLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    if (!Session::has('proveedor_id')) {
        return redirect()->route('proveedor.login')->withErrors(['error_message' => 'Debes iniciar sesión.']);
    }
    return $next($request);
}
}
//