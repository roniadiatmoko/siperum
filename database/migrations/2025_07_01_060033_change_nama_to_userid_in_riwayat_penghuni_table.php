<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::table('riwayat_penghuni')->truncate();
        
        Schema::table('riwayat_penghuni', function (Blueprint $table) {
            $table->unsignedBigInteger('id_warga')->nullable(false)->after('nama');
            $table->index('id_warga');
            
            $table->foreign('id_warga')
                    ->references('id')->on('ref_warga')
                    ->restrictOnDelete();
                    
            $table->dropColumn('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_penghuni', function (Blueprint $table) {
            $table->dropForeign(['id_warga']);
            $table->dropColumn('id_warga');
            
            $table->string('nama')->after('id');
        });
    }
};
