<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KIP extends Model
{
    use HasFactory;
    protected $table = 'kip';
    protected $fillable = [
        'nama',
        'alamat',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'file_pengantar_rt',
        'file_ktp',
        'file_kk',
        'file_akta',
        'asal_sekolah',
        'file_kks',
        'file_rapor',
        'file_penerima_bsm'
    ];
}
