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
        DB::statement("DROP VIEW IF EXISTS master_inventaris");
        DB::statement("CREATE VIEW `master_inventaris` AS select 'inventaris_asset' AS `asset`,`gabungan`.`inventaris_asset`.`config_id` AS `config_id`,`gabungan`.`inventaris_asset`.`id` AS `id`,`gabungan`.`inventaris_asset`.`nama_barang` AS `nama_barang`,`gabungan`.`inventaris_asset`.`kode_barang` AS `kode_barang`,'Baik' AS `kondisi`,`gabungan`.`inventaris_asset`.`keterangan` AS `keterangan`,`gabungan`.`inventaris_asset`.`asal` AS `asal`,`gabungan`.`inventaris_asset`.`tahun_pengadaan` AS `tahun_pengadaan` from `gabungan`.`inventaris_asset` where (`gabungan`.`inventaris_asset`.`visible` = 1) union all select 'inventaris_gedung' AS `asset`,`gabungan`.`inventaris_gedung`.`config_id` AS `config_id`,`gabungan`.`inventaris_gedung`.`id` AS `id`,`gabungan`.`inventaris_gedung`.`nama_barang` AS `nama_barang`,`gabungan`.`inventaris_gedung`.`kode_barang` AS `kode_barang`,`gabungan`.`inventaris_gedung`.`kondisi_bangunan` AS `kondisi_bangunan`,`gabungan`.`inventaris_gedung`.`keterangan` AS `keterangan`,`gabungan`.`inventaris_gedung`.`asal` AS `asal`,year(`gabungan`.`inventaris_gedung`.`tanggal_dokument`) AS `tahun_pengadaan` from `gabungan`.`inventaris_gedung` where (`gabungan`.`inventaris_gedung`.`visible` = 1) union all select 'inventaris_jalan' AS `asset`,`gabungan`.`inventaris_jalan`.`config_id` AS `config_id`,`gabungan`.`inventaris_jalan`.`id` AS `id`,`gabungan`.`inventaris_jalan`.`nama_barang` AS `nama_barang`,`gabungan`.`inventaris_jalan`.`kode_barang` AS `kode_barang`,`gabungan`.`inventaris_jalan`.`kondisi` AS `kondisi`,`gabungan`.`inventaris_jalan`.`keterangan` AS `keterangan`,`gabungan`.`inventaris_jalan`.`asal` AS `asal`,year(`gabungan`.`inventaris_jalan`.`tanggal_dokument`) AS `tahun_pengadaan` from `gabungan`.`inventaris_jalan` where (`gabungan`.`inventaris_jalan`.`visible` = 1) union all select 'inventaris_peralatan' AS `asset`,`gabungan`.`inventaris_peralatan`.`config_id` AS `config_id`,`gabungan`.`inventaris_peralatan`.`id` AS `id`,`gabungan`.`inventaris_peralatan`.`nama_barang` AS `nama_barang`,`gabungan`.`inventaris_peralatan`.`kode_barang` AS `kode_barang`,'Baik' AS `Baik`,`gabungan`.`inventaris_peralatan`.`keterangan` AS `keterangan`,`gabungan`.`inventaris_peralatan`.`asal` AS `asal`,`gabungan`.`inventaris_peralatan`.`tahun_pengadaan` AS `tahun_pengadaan` from `gabungan`.`inventaris_peralatan` where (`gabungan`.`inventaris_peralatan`.`visible` = 1)");
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
