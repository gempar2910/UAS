<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // ==== Form View ====
    public function showLoginMahasiswa() {
        return view('auth.login-mahasiswa');
    }

    public function showLoginAdmin() {
        return view('auth.login-admin');
    }

    public function showRegisterMahasiswa() {
        return view('auth.register-mahasiswa');
    }

    public function showRegisterAdmin() {
        return view('auth.register-admin');
    }

    // ==== Proses Login ====
    public function loginMahasiswa(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'mahasiswa']))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/mahasiswa');
        }

        return back()->withErrors(['email' => 'Login Mahasiswa gagal.'])->onlyInput('email');
    }

    public function loginAdmin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/admin');
        }

        return back()->withErrors(['email' => 'Login Admin gagal.'])->onlyInput('email');
    }

    // ==== Proses Register ====
    public function registerMahasiswa(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'mahasiswa'
        ]);

        Auth::login($user);
        return redirect('/dashboard/mahasiswa');
    }

    public function registerAdmin(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'admin'
        ]);

        Auth::login($user);
        return redirect('/dashboard/admin');
    }

    // ==== Logout ====
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

