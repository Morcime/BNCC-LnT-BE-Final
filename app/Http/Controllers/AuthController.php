<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Auth::user()->role === 'admin' ? redirect('/admin/dashboard') : redirect('/user/katalog');
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah!',
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|min:3|max:40',
            'email' => 'required|email|ends_with:@gmail.com|unique:users,email',
            'password' => 'required|string|min:6|max:12',
            'nomor_hp' => 'required|string|regex:/^08[0-9]{7,11}$/',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect('/login')->with('success', 'Register berhasil!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}