<?php

namespace Database\Seeders;

use App\Models\SIUP;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SIUPSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIUP::insert(array(
            [
             'nik' => '3523124589974432',
             'nama' => 'Nur Hidayati',
             'alamat' => 'Sukorejo No 2', 
             'no_hp' => '0821342312324',
             'jenis_usaha' => 'Makanan',
             'alamat_usaha' => 'Pemuda No 3A',
             'status' => 'Pengajuan ',
             'tgl_status' => Carbon::parse(now())->format('Y-m-d')
            ]
         ));
    }
}
