@extends('mahasiswa.layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Dashboard Mahasiswa</h1>

    <div class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
        KRRS ONLINE MAHASISWA
    </div>

    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded shadow">
        ✔️ Selamat datang <span class="font-bold uppercase">{{ Auth::user()->name }}</span> di <strong>KRRS ONLINE System (v1.4)</strong>.<br>
        Silakan klik menu pada panel sebelah kiri Anda untuk melakukan pengisian KRRS ONLINE dan cetak KSS ONLINE.
    </div>
@endsection
