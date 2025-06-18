@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="mb-6 text-center">
            <img src="{{ asset('images/logo-untar.png') }}" alt="UNTAR Logo" class="mx-auto h-16 mb-4">
            <h2 class="text-2xl font-semibold">Register Mahasiswa</h2>
        </div>
        <form method="POST" action="{{ route('register.mahasiswa') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-1" for="name">Nama</label>
                <input type="text" name="name" id="name" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600"
                       value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1" for="nim">NIM</label>
                <input type="text" name="nim" id="nim" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600"
                       value="{{ old('nim') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1" for="email">Email UNTAR</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600"
                       placeholder="someone@untar.ac.id"
                       value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-1" for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600">
            </div>

            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Register</button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login.mahasiswa') }}" class="text-red-600 text-sm font-semibold">Sudah punya akun? Login</a>
        </div>
    </div>
</div>
@endsection
