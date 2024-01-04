<?php

namespace Database\Seeders;

use App\Models\IMB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IMBSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IMB::insert(array(
            [
             'nik' => '3523124589974432',
             'nama' => 'Nur Hidayati',
             'alamat' => 'Sukorejo No 2', 
             'no_hp' => '0821342312324',
             'lokasi_bangunan' => 'Pemuda No 3A',
             'tipe_bangunan' => 'Tingkat 3',
             'luas_bangunan' => '30m/segi',
             'status' => 'Pengajuan ',
             'tgl_status' => Carbon::parse(now())->format('Y-m-d')
            ]
         ));
    }
}
