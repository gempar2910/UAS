<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'nim',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
