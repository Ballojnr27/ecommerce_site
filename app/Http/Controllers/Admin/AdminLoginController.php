<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view ('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('footwears.index');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Access denied.']);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
