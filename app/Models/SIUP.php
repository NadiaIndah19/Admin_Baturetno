<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SIUP extends Model
{
    use HasFactory;
    protected $table = 'siup';
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_hp',
        'jenis_usaha',
        'alamat_usaha',
        'status',
        'tgl_status'
    ];

    
}
