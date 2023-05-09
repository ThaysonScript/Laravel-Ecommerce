<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categoriasMenu = Categoria::all();     // resgatar isso em qualquer lugar da aplicacao
        view()->share('categoriasMenu', $categoriasMenu);       // executando em si
    }
}
