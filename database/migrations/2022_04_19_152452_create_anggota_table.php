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
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('nomor_ba');
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->string('email');
            $table->boolean('status')->default(1);
            $table->bigInteger('no_ktp')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('status_nikah')->nullable();
            $table->bigInteger('no_npwp')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('kelurahan_ktp')->nullable();
            $table->string('kecamatan_ktp')->nullable();
            $table->string('kota_ktp')->nullable();
            $table->string('provinsi_ktp')->nullable();
            $table->enum('alamat_tinggal',['sesuai','tidakSesuai'])->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('kelurahan_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('provinsi_domisili')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('lokasi_foto_ktp')->nullable();
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
        Schema::dropIfExists('anggota');
    }
};
