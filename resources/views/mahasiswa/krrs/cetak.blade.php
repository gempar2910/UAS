@extends('mahasiswa.layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Cetak KRRS</h1>

    {{-- Informasi Mahasiswa --}}
    <div class="mb-4 p-4 bg-white rounded shadow border text-gray-800 space-y-1 text-sm">
        <div><strong>Nama :</strong> {{ Auth::user()->name }}</div>
        <div><strong>NIM :</strong> {{ Auth::user()->nim }}</div>
        <div><strong>Email :</strong> {{ Auth::user()->email }}</div>
    </div>

    {{-- Tabel Mata Kuliah --}}
    <div class="overflow-x-auto bg-white rounded shadow border mb-6">
        <table class="min-w-full table-auto border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="border px-4 py-2 text-left">Kode</th>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">SKS</th>
                    <th class="border px-4 py-2 text-left">Diambil Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($krrs as $mk)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $mk->kode }}</td>
                        <td class="border px-4 py-2">{{ $mk->nama }}</td>
                        <td class="border px-4 py-2">{{ $mk->sks }}</td>
                        <td class="border px-4 py-2 text-gray-600">{{ $mk->pivot->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-100 font-semibold text-gray-700">
                <tr>
                    <td colspan="2" class="border px-4 py-2 text-right">Total SKS</td>
                    <td colspan="2" class="border px-4 py-2">{{ $krrs->sum('sks') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Tombol Cetak --}}
    <button onclick="window.print()" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 no-print">Cetak</button>

@endsection
