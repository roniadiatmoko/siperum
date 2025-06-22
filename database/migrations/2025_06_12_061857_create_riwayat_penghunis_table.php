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
        Schema::create('riwayat_penghuni', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rumah');
            $table->string('nama');
            $table->date('tanggal_menetap')->nullable();
            $table->boolean('is_aktif')->default(false);
            $table->string('shdk');
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
        Schema::dropIfExists('riwayat_penghuni');
    }
};
