<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'KRRS Online UNTAR') }}</title>
    <link rel="icon" href="{{ asset('images/logo-untar.png') }}" type="image/png">

    <!-- Tailwind CSS CDN (untuk prototipe, bisa diganti dengan build lokal jika sudah setup Vite/Laravel Mix) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tambahan styling khusus (opsional) -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Konten halaman --}}
    @yield('content')

</body>
</html>
