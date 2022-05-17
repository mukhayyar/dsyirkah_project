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
        Schema::create('rincian_pengajuan_emas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->constrained('pengajuan_emas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->index('pengajuan_id');
            $table->string('item');
            $table->string('jenis');
            $table->string('gramasi');
            $table->string('keping');
            $table->string('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_pengajuan_emas');
    }
};
