<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // Si el usuario ya ha verificado su correo, redirigirlo a su página principal según el rol
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user(); // Obtener el usuario autenticado
            return redirect()->intended(RouteServiceProvider::redirectToBasedOnRole($user)); // Redirigir según el rol
        }

        // Enviar la notificación de verificación de correo electrónico
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
