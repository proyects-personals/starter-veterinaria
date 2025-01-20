<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Si el usuario ya ha verificado su correo, redirigir según su rol
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user(); // Obtener el usuario autenticado
            return redirect()->intended(RouteServiceProvider::redirectToBasedOnRole($user)); // Redirigir según el rol
        }

        // Si el usuario no ha verificado su correo, mostrar la vista de verificación
        return view('auth.verify-email');
    }
}
