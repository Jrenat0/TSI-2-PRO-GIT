<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Usuario;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin-gestion',function(Usuario $usuario){
            return $usuario->esAdministrador();
        });

        Gate::define('secretario-gestion',function(Usuario $usuario){
            return $usuario->esAdministrador() || $usuario->esSecretario();
        });


    }
}
