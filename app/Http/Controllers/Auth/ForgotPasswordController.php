<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function requestPassword(): View
    {
        return view('auth.passwords.request');
    }

    public function requestEmail(Request $request): RedirectResponse
    {
        $reset = Password::sendResetLink($request->only('email'));

        return $reset === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($reset)])
                : back()->withErrors(['email' => __($reset)]);
    }

    public function resetPassword($token, Request $request): View
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function updatePassword(ResetPasswordRequest $request): RedirectResponse
    {   
        $reset = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'),function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ]);
            
            $user->save();

            event(new PasswordReset($user));
        });

        return $reset === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($reset))
                : back()->withErrors(['email' => [__($reset)]]);
    }
}
