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
        Schema::create('usaha_images_syirkah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usaha_id')->constrained('usaha_syirkah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
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
        Schema::dropIfExists('usaha_images_syirkah');
    }
};
