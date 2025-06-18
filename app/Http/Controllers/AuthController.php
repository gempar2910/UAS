<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================================
    // ======== LOGIN SECTION =========
    // ================================

    public function showLoginMahasiswa()
    {
        return view('auth.login-mahasiswa');
    }

    public function showLoginAdmin()
    {
        return view('auth.login-admin');
    }

    public function loginMahasiswa(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'mahasiswa']))) {
            $request->session()->regenerate();
            return redirect()->intended('/mahasiswa/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, atau akun bukan mahasiswa.',
        ]);
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, atau akun bukan admin.',
        ]);
    }

    // ================================
    // ======= REGISTER SECTION =======
    // ================================

    public function showRegisterMahasiswa()
    {
        return view('auth.register-mahasiswa');
    }

    public function showRegisterAdmin()
    {
        return view('auth.register-admin');
    }

    public function registerMahasiswa(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'nim'      => 'required|string|unique:users,nim',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'nim'      => $validated['nim'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'mahasiswa',
        ]);

        Auth::login($user);

        return redirect('/mahasiswa/dashboard');
    }

    public function registerAdmin(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'admin',
        ]);

        Auth::login($user);

        return redirect('/admin/dashboard');
    }

    // ================================
    // ============ LOGOUT ============
    // ================================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
