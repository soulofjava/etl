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
        Schema::create('mutasi_inventaris_gedung', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable()->index('mutasi_inventaris_gedung_config_fk');
            $table->integer('id_inventaris_gedung')->nullable()->index('FK_mutasi_inventaris_gedung');
            $table->string('jenis_mutasi', 100)->nullable();
            $table->date('tahun_mutasi');
            $table->double('harga_jual')->nullable();
            $table->string('sumbangkan')->nullable();
            $table->text('keterangan');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('created_by');
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('updated_by');
            $table->integer('visible')->default(1);
            $table->string('status_mutasi', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi_inventaris_gedung');
    }
};
