<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // =======================
    // ==== DASHBOARD ADMIN ===
    // =======================
    public function index()
    {
        $jumlahMahasiswa = User::where('role', 'mahasiswa')->count();
        $jumlahMataKuliah = MataKuliah::count();

        return view('admin.dashboard', compact('jumlahMahasiswa', 'jumlahMataKuliah'));
    }

    // =======================
    // ==== MAHASISWA ========
    // =======================
    public function mahasiswaIndex()
    {
        $mahasiswas = User::where('role', 'mahasiswa')->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    // =======================
    // ==== CRUD MATAKULIAH ==
    // =======================

    // List semua mata kuliah
    public function mataKuliahIndex()
    {
        $mataKuliahs = MataKuliah::all();
        return view('admin.matakuliah.index', compact('mataKuliahs'));
    }

    // Form tambah mata kuliah
    public function createMataKuliah()
    {
        return view('admin.matakuliah.create');
    }

    // Simpan mata kuliah baru
    public function storeMataKuliah(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|unique:mata_kuliahs,kode',
            'nama' => 'required|string',
            'sks'  => 'required|integer|min:1',
        ]);

        MataKuliah::create($validated);

        return redirect()->route('admin.matakuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    // Form edit mata kuliah
    public function editMataKuliah(MataKuliah $mataKuliah)
    {
        return view('admin.matakuliah.edit', compact('mataKuliah'));
    }

    // Update mata kuliah
    public function updateMataKuliah(Request $request, MataKuliah $mataKuliah)
    {
        $validated = $request->validate([
            'kode' => 'required|string|unique:mata_kuliahs,kode,' . $mataKuliah->id,
            'nama' => 'required|string',
            'sks'  => 'required|integer|min:1',
        ]);

        $mataKuliah->update($validated);

        return redirect()->route('admin.matakuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    // Hapus mata kuliah
    public function destroyMataKuliah(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect()->route('admin.matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
