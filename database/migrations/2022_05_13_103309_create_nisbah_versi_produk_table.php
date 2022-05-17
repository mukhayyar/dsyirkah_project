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
        Schema::create('nisbah_versi_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('versi_id')->constrained('versi_produk')->cascadeOnDelete()->cascadeOnUpdate();
            $table->index('versi_id');
            $table->integer('bulan');
            $table->string('nisbah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nisbah_versi_produk');
    }
};
