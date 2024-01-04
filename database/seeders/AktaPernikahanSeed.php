<?php

namespace Database\Seeders;

use App\Models\AktaPernikahan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AktaPernikahanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AktaPernikahan::insert([
            'nama_laki' => 'saifuddin',
            'nik_laki' => '123123',
            'tempat_lahir_laki' => 'tuban',
            'tanggal_lahir_laki' => Carbon::parse(now())->format('Y-m-d'),
            'nama_ayah_laki' => 'Mulyadi',
            'nama_ibu_laki' => 'siti', 
            'alamat_laki' => 'tuban',
            'surat_desa_laki' => ' ',
            'ktp_laki' => ' ',
            'akta_kelahiran_laki' => ' ',
            'ktp_ortu_laki' => ' ', 
            'foto_laki' => ' ',
            'kk_laki' => ' ',
            'nama_pr' => 'Munaroh',
            'nik_pr' => '123123',
            'tempat_lahir_pr' => 'Malang',
            'tanggal_lahir_pr' => Carbon::parse(now())->format('Y-m-d'),
            'nama_ayah_pr' => 'Nusril',
            'nama_ibu_pr' => 'Isyana',
            'alamat_pr' => 'Kediri',
            'surat_desa_pr' => ' ',
            'ktp_pr' => ' ',
            'akta_kelahiran_pr' => ' ',
            'ktp_ortu_pr' => ' ',
            'foto_pr' => ' ',
            'nama_saksi' => 'Khamid',
            'ktp_saksi' => ' ',
            'kk_pr' => ' ',
            'surat_nikah_ortu_lk' => ' ',
            'surat_nikah_ortu_pr' => ' '
        ]);
    }
}