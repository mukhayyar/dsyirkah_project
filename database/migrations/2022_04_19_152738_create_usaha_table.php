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
        Schema::create('usaha', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('profil');
            $table->longText('legalitas');
            $table->enum('status_post',['Draf','Posting','Cancel']);
            $table->date('tanggal_post');
            $table->string('user_create');
            $table->foreignId('jenis_usaha');
            $table->enum('jenis_akad',['Mutlaqah','Muqqayyadah']);
            $table->string('emas_muqqayadah')->nullable();
            $table->string('gram_emas_muqqayadah')->nullable();
            $table->string('jangka_waktu')->nullable();
            $table->string('capaian_muqqayadah')->nullable();
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
        Schema::dropIfExists('usaha');
    }
};
