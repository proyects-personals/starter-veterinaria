<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
        $user = Auth::user();

        if (!$user->hasRole($role)) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
        return $next($request);
    }
}
