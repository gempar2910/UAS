@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="mb-6 text-center">
            <img src="{{ asset('images/logo-untar.png') }}" alt="UNTAR Logo" class="mx-auto h-16 mb-4">
            <h2 class="text-2xl font-semibold">Sign in as Admin</h2>
            <p class="text-gray-500 text-sm">Silahkan login menggunakan akun Admin UNTAR</p>
        </div>
        <form method="POST" action="{{ route('login.admin') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-1" for="email">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600"
                       placeholder="admin@untar.ac.id">
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600"
                       placeholder="••••••••">
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Login</button>
        </form>
        <div class="text-center mt-4">
            <p class="text-gray-600 text-sm">Belum punya akun? 
                <a href="{{ route('register.admin') }}" class="text-red-600 font-semibold">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection
