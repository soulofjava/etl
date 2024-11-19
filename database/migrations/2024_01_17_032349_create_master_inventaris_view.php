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

        DB::statement("DROP VIEW IF EXISTS master_inventaris");
        DB::statement("
            CREATE VIEW `master_inventaris` AS
            SELECT
                'inventaris_asset' AS `asset`,
                `{$database}`.`inventaris_asset`.`config_id` AS `config_id`,
                `{$database}`.`inventaris_asset`.`id` AS `id`,
                `{$database}`.`inventaris_asset`.`nama_barang` AS `nama_barang`,
                `{$database}`.`inventaris_asset`.`kode_barang` AS `kode_barang`,
                'Baik' AS `kondisi`,
                `{$database}`.`inventaris_asset`.`keterangan` AS `keterangan`,
                `{$database}`.`inventaris_asset`.`asal` AS `asal`,
                `{$database}`.`inventaris_asset`.`tahun_pengadaan` AS `tahun_pengadaan`
            FROM
                `{$database}`.`inventaris_asset`
            WHERE
                (`{$database}`.`inventaris_asset`.`visible` = 1)

            UNION ALL

            SELECT
                'inventaris_gedung' AS `asset`,
                `{$database}`.`inventaris_gedung`.`config_id` AS `config_id`,
                `{$database}`.`inventaris_gedung`.`id` AS `id`,
                `{$database}`.`inventaris_gedung`.`nama_barang` AS `nama_barang`,
                `{$database}`.`inventaris_gedung`.`kode_barang` AS `kode_barang`,
                `{$database}`.`inventaris_gedung`.`kondisi_bangunan` AS `kondisi_bangunan`,
                `{$database}`.`inventaris_gedung`.`keterangan` AS `keterangan`,
                `{$database}`.`inventaris_gedung`.`asal` AS `asal`,
                YEAR(`{$database}`.`inventaris_gedung`.`tanggal_dokument`) AS `tahun_pengadaan`
            FROM
                `{$database}`.`inventaris_gedung`
            WHERE
                (`{$database}`.`inventaris_gedung`.`visible` = 1)

            UNION ALL

            SELECT
                'inventaris_jalan' AS `asset`,
                `{$database}`.`inventaris_jalan`.`config_id` AS `config_id`,
                `{$database}`.`inventaris_jalan`.`id` AS `id`,
                `{$database}`.`inventaris_jalan`.`nama_barang` AS `nama_barang`,
                `{$database}`.`inventaris_jalan`.`kode_barang` AS `kode_barang`,
                `{$database}`.`inventaris_jalan`.`kondisi` AS `kondisi`,
                `{$database}`.`inventaris_jalan`.`keterangan` AS `keterangan`,
                `{$database}`.`inventaris_jalan`.`asal` AS `asal`,
                YEAR(`{$database}`.`inventaris_jalan`.`tanggal_dokument`) AS `tahun_pengadaan`
            FROM
                `{$database}`.`inventaris_jalan`
            WHERE
                (`{$database}`.`inventaris_jalan`.`visible` = 1)

            UNION ALL

            SELECT
                'inventaris_peralatan' AS `asset`,
                `{$database}`.`inventaris_peralatan`.`config_id` AS `config_id`,
                `{$database}`.`inventaris_peralatan`.`id` AS `id`,
                `{$database}`.`inventaris_peralatan`.`nama_barang` AS `nama_barang`,
                `{$database}`.`inventaris_peralatan`.`kode_barang` AS `kode_barang`,
                'Baik' AS `kondisi`,
                `{$database}`.`inventaris_peralatan`.`keterangan` AS `keterangan`,
                `{$database}`.`inventaris_peralatan`.`asal` AS `asal`,
                `{$database}`.`inventaris_peralatan`.`tahun_pengadaan` AS `tahun_pengadaan`
            FROM
                `{$database}`.`inventaris_peralatan`
            WHERE
                (`{$database}`.`inventaris_peralatan`.`visible` = 1)
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `master_inventaris`");
    }
};
