<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $userData = $this->getUserData($request);

        $user = User::create($userData);

        event(new Registered($user));

        Auth::guard()->login($user);

        if($user)
        {
            return redirect()->route('dashboard');
        }
    }

    public function resend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Link de verificação enviado');
    }

    public function verifyEmail(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect('/home');
    }

    private function getUserData(RegisterRequest $request): array
    {
        $data = $request->only('email','name','password');
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}
