<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;


class AdminAuthController extends Controller
{
    protected function broker(): PasswordBroker
    {
        return Password::broker('admins');
    }

    public function login(): View|RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }
        return view('admin.login');
    }

    public function processLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials, true)) {
            return redirect()->intended('/admin');
        }
        return redirect()->route('admin.login')->with('error', 'نام کاربری یا رمز عبور اشتباه است!');
    }

    public function logout(): RedirectResponse|Redirector
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
