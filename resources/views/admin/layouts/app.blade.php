<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | KRRS ONLINE</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="text-2xl font-bold p-4 border-b border-gray-700">
            Panel Admin
        </div>

        <nav class="flex-1 p-2 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.mahasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.mahasiswa.index') ? 'bg-gray-800' : '' }}">
                Manajemen Mahasiswa
            </a>

            <a href="{{ route('admin.matakuliah.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 {{ request()->routeIs('admin.matakuliah.*') ? 'bg-gray-800' : '' }}">
                Kelola Mata Kuliah
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded">
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 p-6 overflow-auto">
        @yield('content')
    </div>

</body>
</html>
