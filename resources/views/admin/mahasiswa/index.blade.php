@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Daftar Mahasiswa</h1>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="border px-4 py-2 text-left">NIM</th>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $mahasiswa->nim }}</td>
                        <td class="border px-4 py-2">{{ $mahasiswa->name }}</td>
                        <td class="border px-4 py-2">{{ $mahasiswa->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border px-4 py-2 text-center text-gray-500">Tidak ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginasi --}}
    <div class="mt-4">
        {{ $mahasiswas->links() }}
    </div>
@endsection
