<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa | KRRS ONLINE</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 text-gray-100 flex flex-col">
        <div class="p-4 text-lg font-bold bg-red-600 text-center">KRRS ONLINE</div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">Halaman Utama</a>
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">Kembali ke Landing</a>

            <div class="mt-4 font-semibold text-gray-300 uppercase text-xs">Menu</div>
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">Lintar Mahasiswa</a>
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">Panduan KRRS Non FK</a>
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">Panduan KRRS FK</a>
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">KRRS Reguler</a>
            <a href="#" class="block px-2 py-1 rounded hover:bg-red-500">Cetak KSS Reguler</a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6 overflow-auto">
        @yield('content')
    </main>

</body>
</html>
