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
        Schema::create('akta_kelahirans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kk');
            $table->string('nama_kepala_keluarga');
            $table->string('nama_lengkap_anak');
            $table->string('tempat_lahir');
            $table->string('tempat_lahir_anak');
            $table->date('tanggal_lahir_anak');
            $table->string('jenis_kelamin');
            $table->time('pukul_kelahiran');
            $table->string('jenis_dilahirkan');
            $table->string('nomor_kelahiran');
            $table->string('nomor_anak');
            $table->string('penolong_kelahiran');
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->date('tanggal_kelahiran_ayah');
            $table->date('tanggal_kelahiran_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('kewarganegaraan_ayah');
            $table->string('kewarganegaraan_ibu');
            $table->string('alamat');
            $table->date('tanggal_perkawinan');
            $table->string('file_rs');
            $table->string('file_kk');
            $table->string('file_ktp');
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
        Schema::dropIfExists('akta_kelahirans');
    }
};
