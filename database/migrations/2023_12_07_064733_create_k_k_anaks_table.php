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
        Schema::create('kk_anaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kk_id')->constrained('kk');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('gol_darah');
            $table->string('pendidikan');
            $table->string('status_hub_keluarga');
            $table->string('status_perkawinan');
            $table->date('tgl_perkawinan')->nullable();
            $table->string('kewarganegaraan');                       
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
        Schema::dropIfExists('k_k_anaks');
    }
};
