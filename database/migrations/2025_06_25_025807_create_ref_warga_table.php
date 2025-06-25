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
        Schema::create('ref_warga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nik', 16)->unique();
            $table->char('no_kk', 16);
            $table->unsignedTinyInteger('status_hubungan_keluarga');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('asal_sebelumnya', 255)->nullable();
            $table->unsignedTinyInteger('agama');
            $table->unsignedTinyInteger('status_marital')->nullable();
            $table->unsignedTinyInteger('kewarganegaraan');
            $table->unsignedTinyInteger('pendidikan_terakhir')->nullable();
            $table->unsignedInteger('pekerjaan')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('foto_ktp_path', 255)->nullable();
            $table->boolean('is_aktif')->default(0);
            $table->timestamps();
            
            $table->index(['is_aktif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_warga');
    }
};
