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
        Schema::create('pengajuan_emas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->constrained('anggota')->cascadeOnDelete()->cascadeOnUpdate();
            $table->index('anggota_id');
            $table->string('no_pengajuan');
            $table->string('referensi');
            $table->string('pilihan_program');
            $table->string('jenis_syirkah');
            $table->string('versi_syirkah');
            $table->string('total_gramasi');
            $table->string('no_sertifikat')->nullable();
            $table->string('kode_usaha')->nullable();
            $table->string('nisbah')->nullable();
            $table->string('perpanjangan')->nullable()->default('Tidak Otomatis');
            $table->string('jangka_waktu')->nullable();
            $table->string('alokasi_nisbah')->nullable();
            $table->string('persetujuan')->nullable();
            $table->longText('catatan_pengajuan')->nullable();
            $table->string('ttd');
            $table->longText('catatan_edit')->nullable();
            $table->string('status')->default('Pengajuan');
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
        Schema::dropIfExists('pengajuan_emas');
    }
};
