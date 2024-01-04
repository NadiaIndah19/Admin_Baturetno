<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KKAnak extends Model
{
    use HasFactory;
    protected $table = 'kk_anaks';
    protected $fillable = [
        'kk_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'pekerjaan',
        'gol_darah',
        'pendidikan',
        'status_hub_keluarga',
        'status_perkawinan',
        'tgl_perkawinan',
        'kewarganegaraan',
    ];


 
    public function kk()
    {
        return $this->belongsTo(KK::class, 'kk_id', 'id');
    }
}
