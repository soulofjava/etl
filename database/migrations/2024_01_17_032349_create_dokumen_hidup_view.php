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
        DB::statement("DROP VIEW IF EXISTS dokumen_hidup");

        DB::statement("CREATE VIEW `dokumen_hidup` AS select `gabungan`.`dokumen`.`id` AS `id`,`gabungan`.`dokumen`.`config_id` AS `config_id`,`gabungan`.`dokumen`.`satuan` AS `satuan`,`gabungan`.`dokumen`.`nama` AS `nama`,`gabungan`.`dokumen`.`enabled` AS `enabled`,`gabungan`.`dokumen`.`tgl_upload` AS `tgl_upload`,`gabungan`.`dokumen`.`id_pend` AS `id_pend`,`gabungan`.`dokumen`.`kategori` AS `kategori`,`gabungan`.`dokumen`.`attr` AS `attr`,`gabungan`.`dokumen`.`tipe` AS `tipe`,`gabungan`.`dokumen`.`url` AS `url`,`gabungan`.`dokumen`.`tahun` AS `tahun`,`gabungan`.`dokumen`.`kategori_info_publik` AS `kategori_info_publik`,`gabungan`.`dokumen`.`updated_at` AS `updated_at`,`gabungan`.`dokumen`.`deleted` AS `deleted`,`gabungan`.`dokumen`.`id_syarat` AS `id_syarat`,`gabungan`.`dokumen`.`id_parent` AS `id_parent`,`gabungan`.`dokumen`.`created_at` AS `created_at`,`gabungan`.`dokumen`.`created_by` AS `created_by`,`gabungan`.`dokumen`.`updated_by` AS `updated_by`,`gabungan`.`dokumen`.`dok_warga` AS `dok_warga`,`gabungan`.`dokumen`.`lokasi_arsip` AS `lokasi_arsip` from `gabungan`.`dokumen` where (`gabungan`.`dokumen`.`deleted` <> 1)");
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
