<?php

namespace Database\Seeders;

use App\Models\KIP;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KIPSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KIP::insert(array(
            [
                'nama' => 'Siti',
                'alamat' => 'tuban',
                'nisn' => '123', 
                'tempat_lahir' => 'kediri',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'file_pengantar_rt' => ' ',
                'file_ktp' => ' ',
                'file_kk' => ' ',
                'file_akta' => ' ',
                'asal_sekolah' => 'SMKN 2 Tuban',
                'file_kks' => ' ',
                'file_rapor' => ' ',
                'file_penerima_bsm' => ' '
            ]
        ));
    }
}
