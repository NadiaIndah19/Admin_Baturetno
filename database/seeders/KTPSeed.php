<?php

namespace Database\Seeders;

use App\Models\KTP;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KTPSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KTP::insert(array(
            [
                'nik' => '123',
                'nama' => 'sybanul islam',
                'kota_kelahiran' => 'Solo',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'gol_darah' => 'A', 
                'alamat' => 'Baturetno',
                'agama' => 'Islam',
                'status_perkawinan' => 'Sudah Kawin',
                'pekerjaan' => 'Guru',
                'file_kk' => ' '
            ]
        ));

        KTP::insert(array(
            [
                'nik' => '3528219632123',
                'nama' => 'Nurhaila',
                'kota_kelahiran' => 'Tuban',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'jenis_kelamin' => 'Perempuan',
                'gol_darah' => 'AB', 
                'alamat' => 'Flamboyan no 2 RT 01 Baturetno',
                'agama' => 'Islam',
                'status_perkawinan' => 'Sudah Kawin',
                'pekerjaan' => 'Perawat',
                'file_kk' => ' '
            ]
        ));
        
        KTP::insert(array(
            [
                'nik' => '35231253226843232',
                'nama' => 'koko setyo rahmat',
                'kota_kelahiran' => 'Solo',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'gol_darah' => 'B', 
                'alamat' => 'Jl. Kelurahan Baturetno 22A ',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pelajar',
                'file_kk' => ' '
            ]
        ));
        
        KTP::insert(array(
            [
                'nik' => '3523124993323201',
                'nama' => 'Moh. Zaenuloh',
                'kota_kelahiran' => 'Solo',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'gol_darah' => 'O', 
                'alamat' => 'Sukorejo AA1 Pondok Indah Baturetno',
                'agama' => 'Islam',
                'status_perkawinan' => 'Sudah Kawin',
                'pekerjaan' => 'PNS',
                'file_kk' => ' '
            ]
        ));
    }
}
