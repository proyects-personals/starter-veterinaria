<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // Si ya está verificado, redirigir según su rol
            return redirect()->intended(RouteServiceProvider::redirectToBasedOnRole($request->user()) . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Después de marcar el correo como verificado, redirigir según el rol
        return redirect()->intended(RouteServiceProvider::redirectToBasedOnRole($request->user()) . '?verified=1');
    }
}
