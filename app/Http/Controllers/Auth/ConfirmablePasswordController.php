<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        // Verificar la contraseña
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Guardar en la sesión la confirmación de la contraseña
        $request->session()->put('auth.password_confirmed_at', time());

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Redirigir a la ruta correspondiente según el rol
        return redirect()->intended(RouteServiceProvider::redirectToBasedOnRole($user));
    }
}
