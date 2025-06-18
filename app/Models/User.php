<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nim',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi: Mahasiswa memiliki banyak mata kuliah melalui tabel krrs
     */
    public function mataKuliahs(): BelongsToMany
    {
        return $this->belongsToMany(MataKuliah::class, 'krrs', 'mahasiswa_id', 'mata_kuliah_id')
                    ->withTimestamps();
    }
}
