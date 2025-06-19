<!DOCTYPE html>
<html lang="id">
    <style>
    @media print {
        aside, nav, .print-hidden, button, .no-print {
            display: none !important;
        }

        main {
            margin: 0;
            padding: 0;
        }

        body {
            background: #fff !important;
            color: #000 !important;
        }

        table {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        th, td {
            border: 1px solid #000 !important;
            padding: 6px 8px !important;
        }

        .bg-gray-200, .font-semibold {
            background-color: transparent !important;
            font-weight: normal !important;
        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gray-50">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r flex flex-col justify-between">
        <div>
            <h2 class="text-xl font-semibold p-4 border-b">Panel Mahasiswa</h2>
            <nav class="flex-1 p-2 space-y-1">
                <a href="{{ route('mahasiswa.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">Dashboard</a>
                <a href="{{ route('mahasiswa.krrs.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('mahasiswa.krrs.*') ? 'bg-gray-200 font-semibold' : '' }}">Ambil KRRS</a>
                <a href="{{ route('mahasiswa.krrs.cetak') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('mahasiswa.krrs.cetak') ? 'bg-gray-200 font-semibold' : '' }}">Cetak KRRS</a>
            </nav>
        </div>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}" class="p-4">
            @csrf
            <button type="submit" class="w-full py-2 bg-red-600 text-white rounded hover:bg-red-700">Keluar</button>
        </form>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        {{-- Header --}}
        <div class="flex justify-end items-center gap-2 text-sm mb-4">
            <span class="font-semibold">{{ Auth::user()->name }}</span>
            <span class="text-gray-500">({{ ucfirst(Auth::user()->role) }})</span>
        </div>

        @yield('content')
    </main>

</body>
</html>