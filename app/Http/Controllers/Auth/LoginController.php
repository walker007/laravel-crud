<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
  
    public function index(): View
    {
        return view("auth.login");
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if(Auth::guard()->attempt($request->only('email', 'password')))
        {
            return redirect()->route('dashboard');
        }
        
        throw ValidationException::withMessages([
            'email' => ['Essas credenciais não pertecem a nenhuma conta'],
        ]);
        
    }

    public function logout(Request $request): RedirectResponse
    {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
