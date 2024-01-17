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
        Schema::table('keuangan_ref_bel_operasional', function (Blueprint $table) {
            $table->foreign(['id_keuangan_master'], 'id_keuangan_ref_bel_operasional_master_fk')->references(['id'])->on('keuangan_master')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['config_id'], 'keuangan_ref_bel_operasional_config_fk')->references(['id'])->on('config')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keuangan_ref_bel_operasional', function (Blueprint $table) {
            $table->dropForeign('id_keuangan_ref_bel_operasional_master_fk');
            $table->dropForeign('keuangan_ref_bel_operasional_config_fk');
        });
    }
};
