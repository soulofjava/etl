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
        $database = env('DB_DATABASE'); // Ambil nama database dari .env

        DB::statement("DROP VIEW IF EXISTS dokumen_hidup");

        DB::statement("
            CREATE VIEW `dokumen_hidup` AS
            SELECT
                `{$database}`.`dokumen`.`id` AS `id`,
                `{$database}`.`dokumen`.`config_id` AS `config_id`,
                `{$database}`.`dokumen`.`satuan` AS `satuan`,
                `{$database}`.`dokumen`.`nama` AS `nama`,
                `{$database}`.`dokumen`.`enabled` AS `enabled`,
                `{$database}`.`dokumen`.`tgl_upload` AS `tgl_upload`,
                `{$database}`.`dokumen`.`id_pend` AS `id_pend`,
                `{$database}`.`dokumen`.`kategori` AS `kategori`,
                `{$database}`.`dokumen`.`attr` AS `attr`,
                `{$database}`.`dokumen`.`tipe` AS `tipe`,
                `{$database}`.`dokumen`.`url` AS `url`,
                `{$database}`.`dokumen`.`tahun` AS `tahun`,
                `{$database}`.`dokumen`.`kategori_info_publik` AS `kategori_info_publik`,
                `{$database}`.`dokumen`.`updated_at` AS `updated_at`,
                `{$database}`.`dokumen`.`deleted` AS `deleted`,
                `{$database}`.`dokumen`.`id_syarat` AS `id_syarat`,
                `{$database}`.`dokumen`.`id_parent` AS `id_parent`,
                `{$database}`.`dokumen`.`created_at` AS `created_at`,
                `{$database}`.`dokumen`.`created_by` AS `created_by`,
                `{$database}`.`dokumen`.`updated_by` AS `updated_by`,
                `{$database}`.`dokumen`.`dok_warga` AS `dok_warga`,
                `{$database}`.`dokumen`.`lokasi_arsip` AS `lokasi_arsip`
            FROM
                `{$database}`.`dokumen`
            WHERE
                (`{$database}`.`dokumen`.`deleted` <> 1)
        ");
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
