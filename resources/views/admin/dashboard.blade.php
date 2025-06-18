@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white border rounded shadow p-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Jumlah Mahasiswa</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $jumlahMahasiswa }}</p>
        </div>
        <div class="bg-white border rounded shadow p-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Jumlah Mata Kuliah</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $jumlahMataKuliah }}</p>
        </div>
    </div>
@endsection
