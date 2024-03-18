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
        DB::statement("DROP VIEW IF EXISTS keluarga_aktif");
        DB::statement("CREATE VIEW `keluarga_aktif` AS select `k`.`id` AS `id`,`k`.`config_id` AS `config_id`,`k`.`no_kk` AS `no_kk`,`k`.`nik_kepala` AS `nik_kepala`,`k`.`tgl_daftar` AS `tgl_daftar`,`k`.`kelas_sosial` AS `kelas_sosial`,`k`.`tgl_cetak_kk` AS `tgl_cetak_kk`,`k`.`alamat` AS `alamat`,`k`.`id_cluster` AS `id_cluster`,`k`.`updated_at` AS `updated_at`,`k`.`updated_by` AS `updated_by` from (`gabungan`.`tweb_keluarga` `k` left join `gabungan`.`tweb_penduduk` `p` on((`k`.`nik_kepala` = `p`.`id`))) where (`p`.`status_dasar` = 1)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `keluarga_aktif`");
    }
};
