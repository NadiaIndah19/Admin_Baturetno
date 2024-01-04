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
        Schema::create('akta_pernikahans', function (Blueprint $table) {
            $table->id();           
            $table->string('nama_laki');
            $table->string('nik_laki');
            $table->string('tempat_lahir_laki');
            $table->date('tanggal_lahir_laki');
            $table->string('nama_ayah_laki');
            $table->string('nama_ibu_laki');          
            $table->string('alamat_laki');
            $table->string('surat_desa_laki');
            $table->string('ktp_laki');
            $table->string('akta_kelahiran_laki');
            $table->string('ktp_ortu_laki');
            $table->string('foto_laki');
            $table->string('kk_laki');
            $table->string('surat_nikah_ortu_lk');

            $table->string('nama_pr');
            $table->string('nik_pr');
            $table->string('tempat_lahir_pr');
            $table->date('tanggal_lahir_pr');
            $table->string('nama_ayah_pr');
            $table->string('nama_ibu_pr');          
            $table->string('alamat_pr');
            $table->string('surat_desa_pr');
            $table->string('ktp_pr');
            $table->string('akta_kelahiran_pr');
            $table->string('ktp_ortu_pr');
            $table->string('foto_pr');
            $table->string('kk_pr');
            $table->string('surat_nikah_ortu_pr');
            $table->string('nama_saksi');
            $table->string('ktp_saksi');
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
        Schema::dropIfExists('akta_pernikahans');
    }
};
