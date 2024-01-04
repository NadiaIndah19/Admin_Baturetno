<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RolesSeeder::class);                
        $this->call(UserSeeder::class);
        $this->call(AktaKematianSeed::class);
        $this->call(AktaKelahiranSeed::class);
        $this->call(AktaPernikahanSeed::class);
        $this->call(IMBSeed::class);
        $this->call(InformasiSeed::class);
        $this->call(KIPSeed::class);
        $this->call(KTPSeed::class);
        $this->call(PengaduanSeed::class);
        $this->call(SIUPSeed::class);
        $this->call(KKSeed::class);


    }
}