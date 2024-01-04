<?php

namespace Database\Seeders;

use App\Models\KK;
use App\Models\KKAnak;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KKSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KK::insert(array(
            [
                'id' => 1,
                'nik' => '123',
                'nama' => 'Mulyadi',
                'tempat_lahir' => 'kediri',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'agama' => 'Islam',
                'jenis_kelamin' => 'Laki-Laki',
                'gol_darah' => 'O',
                'pendidikan' => 'Smp',
                'pekerjaan' => 'Wirausaha',
                'status_hub_keluarga' => 'orang tua',
                'status_perkawinan' => 'sudah kawin',
                'tgl_perkawinan' => '2023-12-12',
                'kewarganegaraan' => 'wni',
                'nama_ayah' => 'darsono',
                'nama_ibu' => 'siti',
                'file_pengantar_rt' => ' ',
                'file_kk_lama' => ' ',
                'file_buku_nikah' => ' ',
                'file_ktp' => ' '
            ]
        ));

        KKAnak::insert([
            'kk_id' => 1,
            'nik' => '123',
            'nama' => 'Mulyadi',
            'tempat_lahir' => 'kediri',
            'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki-Laki',
            'gol_darah' => 'O',
            'pendidikan' => 'Smp',
            'pekerjaan' => 'Wirausaha',
            'status_hub_keluarga' => 'Anak',
            'status_perkawinan' => 'sudah kawin',
            'tgl_perkawinan' => '2023-12-12',
            'kewarganegaraan' => 'wni',                        
        ]);
    }
}