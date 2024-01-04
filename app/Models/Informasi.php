<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasis';
    protected $fillable = [
        'nama',
        'judul_berita',
        'jenis_berita',
        'tanggal_berita',
        'tempat_kejadian',
        'kronologi',
        'image'
    ];

}
