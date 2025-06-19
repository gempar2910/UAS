<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KRRS ONLINE UNTAR</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

  <!-- Header / Hero Section -->
  <section class="bg-black text-white py-12 px-4">
    <div class="max-w-4xl mx-auto text-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-4">Aplikasi KRRS ONLINE UNTAR</h1>
      <p class="text-lg">Selamat datang di aplikasi KRRS (Kartu Registrasi Rencana Studi) Online. 
        Aplikasi ini ditujukan untuk mahasiswa yang akan meregistrasi rencana studinya untuk satu semester ke depan. 
        Ikuti aturan dan tata laksana yang telah diatur dalam pengisian KRRS ONLINE ini agar tidak mengalami kendala.
      </p>
    </div>
  </section>

  <!-- Menu Boxes -->
  <section class="py-12 px-4">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      
      <!-- Mahasiswa S1 -->
      <a href="{{ route('login.mahasiswa') }}" class="block bg-blue-600 text-white rounded-lg text-center px-4 py-8 hover:bg-blue-700 transition">
        <h2 class="text-lg font-bold">APLIKASI KRRS MAHASISWA S1</h2>
        <p class="mt-2 text-sm">(KLIK DISINI UNTUK LOGIN SEBAGAI MAHASISWA)</p>
      </a>

      <!-- Mahasiswa S2 dst -->
      <div onclick="goToDashboard()" class="block bg-red-500 text-white rounded-lg text-center px-4 py-8 hover:bg-red-600 transition cursor-pointer">
        <h2 class="text-lg font-bold">APLIKASI KRRS MAHASISWA S2, S3, PROFESI</h2>
        <p class="mt-2 text-sm">(KLIK DISINI UNTUK LOGIN SEBAGAI MAHASISWA)</p>
      </div>

      <!-- Staff -->
      <a href="{{ route('login.admin') }}" class="block bg-yellow-500 text-white rounded-lg text-center px-4 py-8 hover:bg-yellow-600 transition">
        <h2 class="text-lg font-bold">APLIKASI KRRS STAFF</h2>
        <p class="mt-2 text-sm">(KLIK DISINI UNTUK LOGIN SEBAGAI STAFF)</p>
      </a>

      <!-- Panduan -->
      <div onclick="alert('Silakan lihat panduan mahasiswa.')" class="block bg-gray-600 text-white rounded-lg text-center px-4 py-8 hover:bg-gray-700 transition cursor-pointer">
        <h2 class="text-lg font-bold">PANDUAN KRRS MAHASISWA</h2>
        <p class="mt-2 text-sm">(KLIK DISINI UNTUK MELIHAT PANDUAN)</p>
      </div>

    </div>
  </section>

  <script>
    function goToDashboard() {
      alert("Fungsi menuju dashboard belum diimplementasikan.");
      // document.getElementById("landing").classList.add("hidden");
      // document.getElementById("dashboard").classList.remove("hidden");
    }
  </script>

</body>
</html>
