<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Krrs extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
    ];

    /**
     * Relasi ke Mahasiswa (User)
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    /**
     * Relasi ke Mata Kuliah
     */
    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}