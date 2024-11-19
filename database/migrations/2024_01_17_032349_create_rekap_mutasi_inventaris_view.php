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
        $database = env('DB_DATABASE'); // Ambil nama database dari file .env

        DB::statement("DROP VIEW IF EXISTS rekap_mutasi_inventaris");

        DB::statement("
            CREATE VIEW `rekap_mutasi_inventaris` AS
            SELECT
                'inventaris_asset' AS `asset`,
                `{$database}`.`mutasi_inventaris_asset`.`config_id` AS `config_id`,
                `{$database}`.`mutasi_inventaris_asset`.`id_inventaris_asset` AS `id_inventaris_asset`,
                `{$database}`.`mutasi_inventaris_asset`.`status_mutasi` AS `status_mutasi`,
                `{$database}`.`mutasi_inventaris_asset`.`jenis_mutasi` AS `jenis_mutasi`,
                `{$database}`.`mutasi_inventaris_asset`.`tahun_mutasi` AS `tahun_mutasi`,
                `{$database}`.`mutasi_inventaris_asset`.`keterangan` AS `keterangan`
            FROM
                `{$database}`.`mutasi_inventaris_asset`
            WHERE
                (`{$database}`.`mutasi_inventaris_asset`.`visible` = 1)

            UNION ALL

            SELECT
                'inventaris_gedung' AS `asset`,
                `{$database}`.`mutasi_inventaris_gedung`.`config_id` AS `config_id`,
                `{$database}`.`mutasi_inventaris_gedung`.`id_inventaris_gedung` AS `id_inventaris_gedung`,
                `{$database}`.`mutasi_inventaris_gedung`.`status_mutasi` AS `status_mutasi`,
                `{$database}`.`mutasi_inventaris_gedung`.`jenis_mutasi` AS `jenis_mutasi`,
                `{$database}`.`mutasi_inventaris_gedung`.`tahun_mutasi` AS `tahun_mutasi`,
                `{$database}`.`mutasi_inventaris_gedung`.`keterangan` AS `keterangan`
            FROM
                `{$database}`.`mutasi_inventaris_gedung`
            WHERE
                (`{$database}`.`mutasi_inventaris_gedung`.`visible` = 1)

            UNION ALL

            SELECT
                'inventaris_jalan' AS `asset`,
                `{$database}`.`mutasi_inventaris_jalan`.`config_id` AS `config_id`,
                `{$database}`.`mutasi_inventaris_jalan`.`id_inventaris_jalan` AS `id_inventaris_jalan`,
                `{$database}`.`mutasi_inventaris_jalan`.`status_mutasi` AS `status_mutasi`,
                `{$database}`.`mutasi_inventaris_jalan`.`jenis_mutasi` AS `jenis_mutasi`,
                `{$database}`.`mutasi_inventaris_jalan`.`tahun_mutasi` AS `tahun_mutasi`,
                `{$database}`.`mutasi_inventaris_jalan`.`keterangan` AS `keterangan`
            FROM
                `{$database}`.`mutasi_inventaris_jalan`
            WHERE
                (`{$database}`.`mutasi_inventaris_jalan`.`visible` = 1)

            UNION ALL

            SELECT
                'inventaris_peralatan' AS `asset`,
                `{$database}`.`mutasi_inventaris_peralatan`.`config_id` AS `config_id`,
                `{$database}`.`mutasi_inventaris_peralatan`.`id_inventaris_peralatan` AS `id_inventaris_peralatan`,
                `{$database}`.`mutasi_inventaris_peralatan`.`status_mutasi` AS `status_mutasi`,
                `{$database}`.`mutasi_inventaris_peralatan`.`jenis_mutasi` AS `jenis_mutasi`,
                `{$database}`.`mutasi_inventaris_peralatan`.`tahun_mutasi` AS `tahun_mutasi`,
                `{$database}`.`mutasi_inventaris_peralatan`.`keterangan` AS `keterangan`
            FROM
                `{$database}`.`mutasi_inventaris_peralatan`
            WHERE
                (`{$database}`.`mutasi_inventaris_peralatan`.`visible` = 1)
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `rekap_mutasi_inventaris`");
    }
};
