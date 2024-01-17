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
        Schema::table('mutasi_inventaris_tanah', function (Blueprint $table) {
            $table->foreign(['id_inventaris_tanah'], 'FK_mutasi_inventaris_tanah')->references(['id'])->on('inventaris_tanah');
            $table->foreign(['config_id'], 'mutasi_inventaris_tanah_config_fk')->references(['id'])->on('config')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutasi_inventaris_tanah', function (Blueprint $table) {
            $table->dropForeign('FK_mutasi_inventaris_tanah');
            $table->dropForeign('mutasi_inventaris_tanah_config_fk');
        });
    }
};
