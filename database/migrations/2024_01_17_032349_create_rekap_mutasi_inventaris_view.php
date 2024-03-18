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
        DB::statement("DROP VIEW IF EXISTS rekap_mutasi_inventaris");
        DB::statement("CREATE VIEW `rekap_mutasi_inventaris` AS select 'inventaris_asset' AS `asset`,`gabungan`.`mutasi_inventaris_asset`.`config_id` AS `config_id`,`gabungan`.`mutasi_inventaris_asset`.`id_inventaris_asset` AS `id_inventaris_asset`,`gabungan`.`mutasi_inventaris_asset`.`status_mutasi` AS `status_mutasi`,`gabungan`.`mutasi_inventaris_asset`.`jenis_mutasi` AS `jenis_mutasi`,`gabungan`.`mutasi_inventaris_asset`.`tahun_mutasi` AS `tahun_mutasi`,`gabungan`.`mutasi_inventaris_asset`.`keterangan` AS `keterangan` from `gabungan`.`mutasi_inventaris_asset` where (`gabungan`.`mutasi_inventaris_asset`.`visible` = 1) union all select 'inventaris_gedung' AS `inventaris_gedung`,`gabungan`.`mutasi_inventaris_gedung`.`config_id` AS `config_id`,`gabungan`.`mutasi_inventaris_gedung`.`id_inventaris_gedung` AS `id_inventaris_gedung`,`gabungan`.`mutasi_inventaris_gedung`.`status_mutasi` AS `status_mutasi`,`gabungan`.`mutasi_inventaris_gedung`.`jenis_mutasi` AS `jenis_mutasi`,`gabungan`.`mutasi_inventaris_gedung`.`tahun_mutasi` AS `tahun_mutasi`,`gabungan`.`mutasi_inventaris_gedung`.`keterangan` AS `keterangan` from `gabungan`.`mutasi_inventaris_gedung` where (`gabungan`.`mutasi_inventaris_gedung`.`visible` = 1) union all select 'inventaris_jalan' AS `inventaris_jalan`,`gabungan`.`mutasi_inventaris_jalan`.`config_id` AS `config_id`,`gabungan`.`mutasi_inventaris_jalan`.`id_inventaris_jalan` AS `id_inventaris_jalan`,`gabungan`.`mutasi_inventaris_jalan`.`status_mutasi` AS `status_mutasi`,`gabungan`.`mutasi_inventaris_jalan`.`jenis_mutasi` AS `jenis_mutasi`,`gabungan`.`mutasi_inventaris_jalan`.`tahun_mutasi` AS `tahun_mutasi`,`gabungan`.`mutasi_inventaris_jalan`.`keterangan` AS `keterangan` from `gabungan`.`mutasi_inventaris_jalan` where (`gabungan`.`mutasi_inventaris_jalan`.`visible` = 1) union all select 'inventaris_peralatan' AS `inventaris_peralatan`,`gabungan`.`mutasi_inventaris_peralatan`.`config_id` AS `config_id`,`gabungan`.`mutasi_inventaris_peralatan`.`id_inventaris_peralatan` AS `id_inventaris_peralatan`,`gabungan`.`mutasi_inventaris_peralatan`.`status_mutasi` AS `status_mutasi`,`gabungan`.`mutasi_inventaris_peralatan`.`jenis_mutasi` AS `jenis_mutasi`,`gabungan`.`mutasi_inventaris_peralatan`.`tahun_mutasi` AS `tahun_mutasi`,`gabungan`.`mutasi_inventaris_peralatan`.`keterangan` AS `keterangan` from `gabungan`.`mutasi_inventaris_peralatan` where (`gabungan`.`mutasi_inventaris_peralatan`.`visible` = 1)");
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
