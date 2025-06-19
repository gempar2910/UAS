<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Krrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MahasiswaController extends Controller
{
    // Dashboard Mahasiswa
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    // Tampilkan semua Mata Kuliah yang bisa diambil
    public function krrsIndex()
    {
        $mataKuliahs = MataKuliah::all();
        $krsDiambil = Auth::user()->mataKuliahs->pluck('id')->toArray(); // ID mata kuliah yang sudah diambil

        return view('mahasiswa.krrs.index', compact('mataKuliahs', 'krsDiambil'));
    }

    // Proses Ambil KRRS
    public function ambilKrrs(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
        ]);

        $user = Auth::user();

        // Cek apakah mata kuliah sudah diambil
        if ($user->mataKuliahs()->where('mata_kuliah_id', $request->mata_kuliah_id)->exists()) {
            return back()->with('error', 'Mata kuliah ini sudah Anda ambil.');
        }

        // Simpan KRRS
        Krrs::create([
            'mahasiswa_id'   => $user->id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
        ]);

        return back()->with('success', 'Mata kuliah berhasil ditambahkan ke KRRS.');
    }

    // Cetak KRRs (opsional)
    public function cetakKrrs()
    {
        $krrs = Auth::user()->mataKuliahs()->withPivot('created_at')->get();
        return view('mahasiswa.krrs.cetak', compact('krrs'));
    }
}
