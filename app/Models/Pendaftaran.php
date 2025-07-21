<?php
// File: app/Models/Pendaftaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'jurusan',
        'program_studi',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'alamat',
        'organisasi_yang_pernah_diikuti',
        'alasan_bergabung',
        'foto_diri',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}