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
        Schema::table('klasifikasi_surat', function (Blueprint $table) {
            $table->foreign(['config_id'], 'klasifikasi_surat_config_fk')->references(['id'])->on('config')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('klasifikasi_surat', function (Blueprint $table) {
            $table->dropForeign('klasifikasi_surat_config_fk');
        });
    }
};
