<?php

namespace Database\Seeders;

use App\Models\AktaKematian;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AktaKematianSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AktaKematian::insert(array(
            [
                'nama_pendaftar' => "Lukman Haqim",
                'hubungan' => 'Anak',
                'nik_alm' => '123123123123',
                'nama' => 'Santoso',
                'tanggal_lahir' => Carbon::parse(now())->format('Y-m-d'),
                'tempat_lahir' => 'Tuban',
                'agama' => 'Islam',
                'status_perkawinan' => 'Sudah Kawin',
                'jenis_kelamin' => 'Laki - Laki',
                'pekerjaan' => "Petani",
                'kewarganegaraan' => 'Wni',
                'tanggal_meninggal' => Carbon::parse(now())->format('Y-m-d'),
                'penyebab_kematian' => 'Sudah Tua',
                'tempat_meninggal' => 'Rumah',
                'alamat' => 'Tuban',
                'catatan' => 'NO',  
                'file_pernyataan' => '',
                'file_ktp' => ' ',
                'file_kk' => ' ',
                'file_ttd' => ' ',
                'file_akta_kelahiran' => ' ',
                'file_buku_nikah' => ' '
            ]
        ));
        
    }
}
