<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaPernikahan extends Model
{
    use HasFactory;
    protected $table ='akta_pernikahans';
    protected $fillable = [
            'nama_laki',
            'nik_laki',
            'tempat_lahir_laki',
            'tanggal_lahir_laki',
            'nama_ayah_laki',
            'nama_ibu_laki',
            'alamat_laki',
            'surat_desa_laki',
            'ktp_laki',
            'akta_kelahiran_laki',
            'ktp_ortu_laki',
            'foto_laki',
            'kk_laki',
            'nama_pr',
            'nik_pr',
            'tempat_lahir_pr',
            'tanggal_lahir_pr',
            'nama_ayah_pr',
            'nama_ibu_pr',
            'alamat_pr',
            'surat_desa_pr',
            'ktp_pr',
            'akta_kelahiran_pr',
            'ktp_ortu_pr',
            'foto_pr',
            'nama_saksi',
            'ktp_saksi',
            'kk_pr',
            'surat_nikah_ortu_lk',
            'surat_nikah_ortu_pr'
    ];
}
