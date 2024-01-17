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
        DB::statement("CREATE VIEW `penduduk_hidup` AS select `umum`.`tweb_penduduk`.`id` AS `id`,`umum`.`tweb_penduduk`.`config_id` AS `config_id`,`umum`.`tweb_penduduk`.`nama` AS `nama`,`umum`.`tweb_penduduk`.`nik` AS `nik`,`umum`.`tweb_penduduk`.`id_kk` AS `id_kk`,`umum`.`tweb_penduduk`.`kk_level` AS `kk_level`,`umum`.`tweb_penduduk`.`id_rtm` AS `id_rtm`,`umum`.`tweb_penduduk`.`rtm_level` AS `rtm_level`,`umum`.`tweb_penduduk`.`sex` AS `sex`,`umum`.`tweb_penduduk`.`tempatlahir` AS `tempatlahir`,`umum`.`tweb_penduduk`.`tanggallahir` AS `tanggallahir`,`umum`.`tweb_penduduk`.`agama_id` AS `agama_id`,`umum`.`tweb_penduduk`.`pendidikan_kk_id` AS `pendidikan_kk_id`,`umum`.`tweb_penduduk`.`pendidikan_sedang_id` AS `pendidikan_sedang_id`,`umum`.`tweb_penduduk`.`pekerjaan_id` AS `pekerjaan_id`,`umum`.`tweb_penduduk`.`status_kawin` AS `status_kawin`,`umum`.`tweb_penduduk`.`warganegara_id` AS `warganegara_id`,`umum`.`tweb_penduduk`.`dokumen_pasport` AS `dokumen_pasport`,`umum`.`tweb_penduduk`.`dokumen_kitas` AS `dokumen_kitas`,`umum`.`tweb_penduduk`.`ayah_nik` AS `ayah_nik`,`umum`.`tweb_penduduk`.`ibu_nik` AS `ibu_nik`,`umum`.`tweb_penduduk`.`nama_ayah` AS `nama_ayah`,`umum`.`tweb_penduduk`.`nama_ibu` AS `nama_ibu`,`umum`.`tweb_penduduk`.`foto` AS `foto`,`umum`.`tweb_penduduk`.`golongan_darah_id` AS `golongan_darah_id`,`umum`.`tweb_penduduk`.`id_cluster` AS `id_cluster`,`umum`.`tweb_penduduk`.`status` AS `status`,`umum`.`tweb_penduduk`.`alamat_sebelumnya` AS `alamat_sebelumnya`,`umum`.`tweb_penduduk`.`alamat_sekarang` AS `alamat_sekarang`,`umum`.`tweb_penduduk`.`status_dasar` AS `status_dasar`,`umum`.`tweb_penduduk`.`hamil` AS `hamil`,`umum`.`tweb_penduduk`.`cacat_id` AS `cacat_id`,`umum`.`tweb_penduduk`.`sakit_menahun_id` AS `sakit_menahun_id`,`umum`.`tweb_penduduk`.`akta_lahir` AS `akta_lahir`,`umum`.`tweb_penduduk`.`akta_perkawinan` AS `akta_perkawinan`,`umum`.`tweb_penduduk`.`tanggalperkawinan` AS `tanggalperkawinan`,`umum`.`tweb_penduduk`.`akta_perceraian` AS `akta_perceraian`,`umum`.`tweb_penduduk`.`tanggalperceraian` AS `tanggalperceraian`,`umum`.`tweb_penduduk`.`cara_kb_id` AS `cara_kb_id`,`umum`.`tweb_penduduk`.`telepon` AS `telepon`,`umum`.`tweb_penduduk`.`tanggal_akhir_paspor` AS `tanggal_akhir_paspor`,`umum`.`tweb_penduduk`.`no_kk_sebelumnya` AS `no_kk_sebelumnya`,`umum`.`tweb_penduduk`.`ktp_el` AS `ktp_el`,`umum`.`tweb_penduduk`.`status_rekam` AS `status_rekam`,`umum`.`tweb_penduduk`.`waktu_lahir` AS `waktu_lahir`,`umum`.`tweb_penduduk`.`tempat_dilahirkan` AS `tempat_dilahirkan`,`umum`.`tweb_penduduk`.`jenis_kelahiran` AS `jenis_kelahiran`,`umum`.`tweb_penduduk`.`kelahiran_anak_ke` AS `kelahiran_anak_ke`,`umum`.`tweb_penduduk`.`penolong_kelahiran` AS `penolong_kelahiran`,`umum`.`tweb_penduduk`.`berat_lahir` AS `berat_lahir`,`umum`.`tweb_penduduk`.`panjang_lahir` AS `panjang_lahir`,`umum`.`tweb_penduduk`.`tag_id_card` AS `tag_id_card`,`umum`.`tweb_penduduk`.`created_at` AS `created_at`,`umum`.`tweb_penduduk`.`created_by` AS `created_by`,`umum`.`tweb_penduduk`.`updated_at` AS `updated_at`,`umum`.`tweb_penduduk`.`updated_by` AS `updated_by`,`umum`.`tweb_penduduk`.`id_asuransi` AS `id_asuransi`,`umum`.`tweb_penduduk`.`no_asuransi` AS `no_asuransi`,`umum`.`tweb_penduduk`.`email` AS `email`,`umum`.`tweb_penduduk`.`email_token` AS `email_token`,`umum`.`tweb_penduduk`.`email_tgl_kadaluarsa` AS `email_tgl_kadaluarsa`,`umum`.`tweb_penduduk`.`email_tgl_verifikasi` AS `email_tgl_verifikasi`,`umum`.`tweb_penduduk`.`telegram` AS `telegram`,`umum`.`tweb_penduduk`.`telegram_token` AS `telegram_token`,`umum`.`tweb_penduduk`.`telegram_tgl_kadaluarsa` AS `telegram_tgl_kadaluarsa`,`umum`.`tweb_penduduk`.`telegram_tgl_verifikasi` AS `telegram_tgl_verifikasi`,`umum`.`tweb_penduduk`.`bahasa_id` AS `bahasa_id`,`umum`.`tweb_penduduk`.`ket` AS `ket`,`umum`.`tweb_penduduk`.`negara_asal` AS `negara_asal`,`umum`.`tweb_penduduk`.`tempat_cetak_ktp` AS `tempat_cetak_ktp`,`umum`.`tweb_penduduk`.`tanggal_cetak_ktp` AS `tanggal_cetak_ktp`,`umum`.`tweb_penduduk`.`suku` AS `suku`,`umum`.`tweb_penduduk`.`bpjs_ketenagakerjaan` AS `bpjs_ketenagakerjaan`,`umum`.`tweb_penduduk`.`hubung_warga` AS `hubung_warga` from `umum`.`tweb_penduduk` where (`umum`.`tweb_penduduk`.`status_dasar` = 1)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `penduduk_hidup`");
    }
};
