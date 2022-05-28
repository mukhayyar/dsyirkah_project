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
        Schema::create('nonaktif_rupiah_syirkah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->constrained('pengajuan_rupiah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('anggota_id')->constrained('anggota')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode_sertifikat');
            $table->dateTime('tanggal_non_aktif');
            $table->enum('kategori',['Selesai Akad','Batal Akad']);
            $table->dateTime('tanggal_pengiriman_barang')->nullable();
            $table->dateTime('tanggal_selesai')->nullable();
            $table->string('foto_pengiriman')->nullable();
            $table->enum('status',['Proses','Close'])->default('Proses');
            $table->string('kebutuhan');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nonaktif_rupiah_syirkah');
    }
};
