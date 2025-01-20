<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Ruta de redirección por defecto.
     */
    public const HOMEADMIN = '/admin/dashboard';
    public const HOMEUSER = '/user/dashboard';

    public function boot(): void
    {
        // Lógica de limitación de tasa
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Método para determinar la ruta de redirección según el rol.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return string
     */
    public static function redirectToBasedOnRole($user)
    {
        if ($user->hasRole('admin')) {
            return self::HOMEADMIN;
        }

        return self::HOMEUSER;
    }
}
