<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'sks',
    ];

    /**
     * Relasi: Mata kuliah diambil oleh banyak mahasiswa melalui tabel krrs
     */
    public function mahasiswas(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'krrs', 'mata_kuliah_id', 'mahasiswa_id')
                    ->withTimestamps();
    }
}
