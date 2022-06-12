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
        Schema::create('perpanjangan_emas_syirkah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->constrained('pengajuan_emas_syirkah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('jatuh_tempo_sebelumnya')->nullable();
            $table->date('tgl_akad_baru');
            $table->string('jangka_waktu');
            $table->date('jatuh_tempo_akan_datang');
            $table->string('nisbah');
            $table->enum('status',['approved','pengajuan'])->default('pengajuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpanjangan_emas_syirkah');
    }
};
