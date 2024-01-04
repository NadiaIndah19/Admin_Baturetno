<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaduan::insert(array(
            [
                'nama' => 'Nardi',
                'nik' => '123123123',
                'judul_pengaduan' => 'Jalan rusak berlubang',
                'jenis_pengaduan' => 'Lingkungan',
                'lokasi_pengaduan' => 'SMAN 1 Tuban',
                'lampiran' =>' ',
                'deskripsi' => 'tidak ada'
            ]
            ));
    }
}
