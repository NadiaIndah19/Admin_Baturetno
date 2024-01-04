<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaKelahiran extends Model
{
    use HasFactory;
    protected $table = 'akta_kelahirans';
    protected $fillable = [
        'nomor_kk',
        'nama_kepala_keluarga',
        'nama_lengkap_anak',
        'tempat_lahir',
        'tempat_lahir_anak',
        'tanggal_lahir_anak',
        'jenis_dilahirkan',
        'nomor_kelahiran',
        'nomor_anak',
        'penolong_kelahiran',
        'nik_ayah',
        'nik_ibu',
        'nama_ayah',
        'nama_ibu',
        'tanggal_kelahiran_ayah',
        'tanggal_kelahiran_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'kewarganegaraan_ayah',
        'kewarganegaraan_ibu',
        'alamat',
        'tanggal_perkawinan',
        'file_rs',
        'file_kk',
        'file_ktp',
        'file_buku_nikah',
        'jenis_kelamin',
        'pukul_kelahiran'
    ];
}
