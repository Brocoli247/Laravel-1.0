<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View Composer global para el contador de carrito
        \View::composer('*', function ($view) {
            $carritoCount = 0;
            if (session()->has('cliente')) {
                $clienteId = session('cliente')['ID_Cliente'] ?? null;
                if ($clienteId) {
                    $carritoCount = \App\Models\Carrito::where('ID_Cliente', $clienteId)->sum('Cantidad');
                }
            }
            $view->with('carritoCount', $carritoCount);
        });
    }
}
