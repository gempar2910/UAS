<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profileMahasiswa()
    {
        return $this->hasOne(ProfileMahasiswa::class, 'mahasiswa_id');
    }

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class, 'mahasiswa_id', 'id');
    }
}
