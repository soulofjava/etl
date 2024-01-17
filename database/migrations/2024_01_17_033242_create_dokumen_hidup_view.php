<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `dokumen_hidup` AS select `umum`.`dokumen`.`id` AS `id`,`umum`.`dokumen`.`config_id` AS `config_id`,`umum`.`dokumen`.`satuan` AS `satuan`,`umum`.`dokumen`.`nama` AS `nama`,`umum`.`dokumen`.`enabled` AS `enabled`,`umum`.`dokumen`.`tgl_upload` AS `tgl_upload`,`umum`.`dokumen`.`id_pend` AS `id_pend`,`umum`.`dokumen`.`kategori` AS `kategori`,`umum`.`dokumen`.`attr` AS `attr`,`umum`.`dokumen`.`tipe` AS `tipe`,`umum`.`dokumen`.`url` AS `url`,`umum`.`dokumen`.`tahun` AS `tahun`,`umum`.`dokumen`.`kategori_info_publik` AS `kategori_info_publik`,`umum`.`dokumen`.`updated_at` AS `updated_at`,`umum`.`dokumen`.`deleted` AS `deleted`,`umum`.`dokumen`.`id_syarat` AS `id_syarat`,`umum`.`dokumen`.`id_parent` AS `id_parent`,`umum`.`dokumen`.`created_at` AS `created_at`,`umum`.`dokumen`.`created_by` AS `created_by`,`umum`.`dokumen`.`updated_by` AS `updated_by`,`umum`.`dokumen`.`dok_warga` AS `dok_warga`,`umum`.`dokumen`.`lokasi_arsip` AS `lokasi_arsip` from `umum`.`dokumen` where (`umum`.`dokumen`.`deleted` <> 1)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `dokumen_hidup`");
    }
};
