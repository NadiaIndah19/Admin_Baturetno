<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_kematians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendaftar');
            $table->string('hubungan');
            $table->string('nik_alm');
            $table->string('nama');
            $table->string('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('tanggal_meninggal');
            $table->string('tempat_meninggal');
            $table->string('penyebab_kematian');
            $table->string('alamat');
            $table->string('catatan');
            $table->string('file_pernyataan');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_ttd');
            $table->string('file_akta_kelahiran');
            $table->string('file_buku_nikah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akta_kematians');
    }
};
