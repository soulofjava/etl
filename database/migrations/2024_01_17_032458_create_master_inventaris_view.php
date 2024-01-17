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
        DB::statement("CREATE VIEW `master_inventaris` AS select 'inventaris_asset' AS `asset`,`umum`.`inventaris_asset`.`config_id` AS `config_id`,`umum`.`inventaris_asset`.`id` AS `id`,`umum`.`inventaris_asset`.`nama_barang` AS `nama_barang`,`umum`.`inventaris_asset`.`kode_barang` AS `kode_barang`,'Baik' AS `kondisi`,`umum`.`inventaris_asset`.`keterangan` AS `keterangan`,`umum`.`inventaris_asset`.`asal` AS `asal`,`umum`.`inventaris_asset`.`tahun_pengadaan` AS `tahun_pengadaan` from `umum`.`inventaris_asset` where (`umum`.`inventaris_asset`.`visible` = 1) union all select 'inventaris_gedung' AS `asset`,`umum`.`inventaris_gedung`.`config_id` AS `config_id`,`umum`.`inventaris_gedung`.`id` AS `id`,`umum`.`inventaris_gedung`.`nama_barang` AS `nama_barang`,`umum`.`inventaris_gedung`.`kode_barang` AS `kode_barang`,`umum`.`inventaris_gedung`.`kondisi_bangunan` AS `kondisi_bangunan`,`umum`.`inventaris_gedung`.`keterangan` AS `keterangan`,`umum`.`inventaris_gedung`.`asal` AS `asal`,year(`umum`.`inventaris_gedung`.`tanggal_dokument`) AS `tahun_pengadaan` from `umum`.`inventaris_gedung` where (`umum`.`inventaris_gedung`.`visible` = 1) union all select 'inventaris_jalan' AS `asset`,`umum`.`inventaris_jalan`.`config_id` AS `config_id`,`umum`.`inventaris_jalan`.`id` AS `id`,`umum`.`inventaris_jalan`.`nama_barang` AS `nama_barang`,`umum`.`inventaris_jalan`.`kode_barang` AS `kode_barang`,`umum`.`inventaris_jalan`.`kondisi` AS `kondisi`,`umum`.`inventaris_jalan`.`keterangan` AS `keterangan`,`umum`.`inventaris_jalan`.`asal` AS `asal`,year(`umum`.`inventaris_jalan`.`tanggal_dokument`) AS `tahun_pengadaan` from `umum`.`inventaris_jalan` where (`umum`.`inventaris_jalan`.`visible` = 1) union all select 'inventaris_peralatan' AS `asset`,`umum`.`inventaris_peralatan`.`config_id` AS `config_id`,`umum`.`inventaris_peralatan`.`id` AS `id`,`umum`.`inventaris_peralatan`.`nama_barang` AS `nama_barang`,`umum`.`inventaris_peralatan`.`kode_barang` AS `kode_barang`,'Baik' AS `Baik`,`umum`.`inventaris_peralatan`.`keterangan` AS `keterangan`,`umum`.`inventaris_peralatan`.`asal` AS `asal`,`umum`.`inventaris_peralatan`.`tahun_pengadaan` AS `tahun_pengadaan` from `umum`.`inventaris_peralatan` where (`umum`.`inventaris_peralatan`.`visible` = 1)");
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
