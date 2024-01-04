<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informasi::insert(array(
           [
            'nama' => 'Wisata Rohani Surabaya',
            'judul_berita' => 'Masjid Tengkleng ',
            'jenis_berita' => 'Pendidikan', 
            'tanggal_berita' => Carbon::parse(now())->format('Y-m-d'),
            'tempat_kejadian' => 'Surabaya',
            'kronologi' => 'tidak ada',
            'image' => ' '
           ]
        ));
    }
}
