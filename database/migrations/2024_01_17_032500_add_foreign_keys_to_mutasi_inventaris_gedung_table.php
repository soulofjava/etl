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
        Schema::table('mutasi_inventaris_gedung', function (Blueprint $table) {
            $table->foreign(['id_inventaris_gedung'], 'FK_mutasi_inventaris_gedung')->references(['id'])->on('inventaris_gedung');
            $table->foreign(['config_id'], 'mutasi_inventaris_gedung_config_fk')->references(['id'])->on('config')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutasi_inventaris_gedung', function (Blueprint $table) {
            $table->dropForeign('FK_mutasi_inventaris_gedung');
            $table->dropForeign('mutasi_inventaris_gedung_config_fk');
        });
    }
};
