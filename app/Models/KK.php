<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    use HasFactory;
    protected $table = 'kk';
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'gol_darah',
        'pendidikan',
        'pekerjaan',
        'status_hub_keluarga',
        'status_perkawinan',
        'tgl_perkawinan',
        'kewarganegaraan',
        'nama_ayah',
        'nama_ibu',
        'file_pengantar_rt',
        'file_kk_lama',
        'file_buku_nikah',
        'file_ktp'
    ];


    public function anak()
    {
        return $this->hasMany(KKAnak::class, 'kk_id');
    }
}
