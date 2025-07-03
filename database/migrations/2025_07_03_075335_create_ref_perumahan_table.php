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
        Schema::create('ref_perumahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->text('alamat_jalan');
            $table->string('kode_kelurahan', 16);
            $table->string('kode_kecamatan', 16);
            $table->string('kode_kabupaten', 16);
            $table->string('kode_provinsi', 16);
            $table->boolean('is_aktif');
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
        Schema::dropIfExists('ref_perumahan');
    }
};
