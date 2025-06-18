<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MataKuliah;
use App\Models\Krrs;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin
        User::create([
            'name' => 'Admin UNTAR',
            'nim' => null,
            'email' => 'admin@untar.ac.id',
            'password' => Hash::make('password'), // Ganti jika perlu
            'role' => 'admin'
        ]);

        // Buat 10 Mahasiswa
        $mahasiswaList = [];
        for ($i = 1; $i <= 10; $i++) {
            $mahasiswaList[] = User::create([
                'name' => 'Mahasiswa ' . $i,
                'nim' => '12345' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'email' => 'mahasiswa' . $i . '@untar.ac.id',
                'password' => Hash::make('password'), // Ganti jika perlu
                'role' => 'mahasiswa'
            ]);
        }

        // Buat 5 Mata Kuliah
        $mataKuliahs = [
            ['kode' => 'MK001', 'nama' => 'Backend', 'sks' => 3],
            ['kode' => 'MK002', 'nama' => 'Big Data', 'sks' => 3],
            ['kode' => 'MK003', 'nama' => 'Computation II', 'sks' => 3],
            ['kode' => 'MK004', 'nama' => 'Data Structure', 'sks' => 3],
            ['kode' => 'MK005', 'nama' => 'Numerical', 'sks' => 3],
        ];

        foreach ($mataKuliahs as $mk) {
            MataKuliah::create($mk);
        }

        $allMataKuliah = MataKuliah::all();

        // Generate KRRs: 10 Mahasiswa, tiap mahasiswa ambil 1-5 mata kuliah random
        foreach ($mahasiswaList as $mahasiswa) {
            $jumlahMataKuliah = rand(1, 5);
            $randomMataKuliah = $allMataKuliah->random($jumlahMataKuliah);

            foreach ($randomMataKuliah as $mataKuliah) {
                Krrs::create([
                    'mahasiswa_id' => $mahasiswa->id,
                    'mata_kuliah_id' => $mataKuliah->id
                ]);
            }
        }
    }
}
