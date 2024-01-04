<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaKematian extends Model
{
    use HasFactory;
    protected $table = 'akta_kematians';
    protected $fillable = [
        'nama_pendaftar',
        'hubungan',
        'nik_alm',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'status_perkawinan',
        'jenis_kelamin',
        'pekerjaan',
        'kewarganegaraan',
        'tanggal_meninggal',
        'penyebab_kematian',
        'tempat_meninggal',
        'alamat',
        'catatan',  
        'file_pernyataan',
        'file_ktp',
        'file_kk',
        'file_ttd',
        'file_akta_kelahiran',
        'file_buku_nikah'
    ];
}
