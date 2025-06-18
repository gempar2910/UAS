@extends('mahasiswa.layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Ambil KRRS</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="border px-4 py-2">Kode</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">SKS</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mataKuliahs as $mk)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $mk->kode }}</td>
                        <td class="border px-4 py-2">{{ $mk->nama }}</td>
                        <td class="border px-4 py-2">{{ $mk->sks }}</td>
                        <td class="border px-4 py-2 text-center">
                            @if (in_array($mk->id, $krsDiambil))
                                <span class="text-green-600 font-semibold">Sudah Diambil</span>
                            @else
                                <form method="POST" action="{{ route('mahasiswa.krrs.ambil') }}">
                                    @csrf
                                    <input type="hidden" name="mata_kuliah_id" value="{{ $mk->id }}">
                                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Ambil</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
