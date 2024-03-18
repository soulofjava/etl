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

        DB::statement("DROP VIEW IF EXISTS penduduk_hidup");
        DB::statement("CREATE VIEW `penduduk_hidup` AS select `gabungan`.`tweb_penduduk`.`id` AS `id`,`gabungan`.`tweb_penduduk`.`config_id` AS `config_id`,`gabungan`.`tweb_penduduk`.`nama` AS `nama`,`gabungan`.`tweb_penduduk`.`nik` AS `nik`,`gabungan`.`tweb_penduduk`.`id_kk` AS `id_kk`,`gabungan`.`tweb_penduduk`.`kk_level` AS `kk_level`,`gabungan`.`tweb_penduduk`.`id_rtm` AS `id_rtm`,`gabungan`.`tweb_penduduk`.`rtm_level` AS `rtm_level`,`gabungan`.`tweb_penduduk`.`sex` AS `sex`,`gabungan`.`tweb_penduduk`.`tempatlahir` AS `tempatlahir`,`gabungan`.`tweb_penduduk`.`tanggallahir` AS `tanggallahir`,`gabungan`.`tweb_penduduk`.`agama_id` AS `agama_id`,`gabungan`.`tweb_penduduk`.`pendidikan_kk_id` AS `pendidikan_kk_id`,`gabungan`.`tweb_penduduk`.`pendidikan_sedang_id` AS `pendidikan_sedang_id`,`gabungan`.`tweb_penduduk`.`pekerjaan_id` AS `pekerjaan_id`,`gabungan`.`tweb_penduduk`.`status_kawin` AS `status_kawin`,`gabungan`.`tweb_penduduk`.`warganegara_id` AS `warganegara_id`,`gabungan`.`tweb_penduduk`.`dokumen_pasport` AS `dokumen_pasport`,`gabungan`.`tweb_penduduk`.`dokumen_kitas` AS `dokumen_kitas`,`gabungan`.`tweb_penduduk`.`ayah_nik` AS `ayah_nik`,`gabungan`.`tweb_penduduk`.`ibu_nik` AS `ibu_nik`,`gabungan`.`tweb_penduduk`.`nama_ayah` AS `nama_ayah`,`gabungan`.`tweb_penduduk`.`nama_ibu` AS `nama_ibu`,`gabungan`.`tweb_penduduk`.`foto` AS `foto`,`gabungan`.`tweb_penduduk`.`golongan_darah_id` AS `golongan_darah_id`,`gabungan`.`tweb_penduduk`.`id_cluster` AS `id_cluster`,`gabungan`.`tweb_penduduk`.`status` AS `status`,`gabungan`.`tweb_penduduk`.`alamat_sebelumnya` AS `alamat_sebelumnya`,`gabungan`.`tweb_penduduk`.`alamat_sekarang` AS `alamat_sekarang`,`gabungan`.`tweb_penduduk`.`status_dasar` AS `status_dasar`,`gabungan`.`tweb_penduduk`.`hamil` AS `hamil`,`gabungan`.`tweb_penduduk`.`cacat_id` AS `cacat_id`,`gabungan`.`tweb_penduduk`.`sakit_menahun_id` AS `sakit_menahun_id`,`gabungan`.`tweb_penduduk`.`akta_lahir` AS `akta_lahir`,`gabungan`.`tweb_penduduk`.`akta_perkawinan` AS `akta_perkawinan`,`gabungan`.`tweb_penduduk`.`tanggalperkawinan` AS `tanggalperkawinan`,`gabungan`.`tweb_penduduk`.`akta_perceraian` AS `akta_perceraian`,`gabungan`.`tweb_penduduk`.`tanggalperceraian` AS `tanggalperceraian`,`gabungan`.`tweb_penduduk`.`cara_kb_id` AS `cara_kb_id`,`gabungan`.`tweb_penduduk`.`telepon` AS `telepon`,`gabungan`.`tweb_penduduk`.`tanggal_akhir_paspor` AS `tanggal_akhir_paspor`,`gabungan`.`tweb_penduduk`.`no_kk_sebelumnya` AS `no_kk_sebelumnya`,`gabungan`.`tweb_penduduk`.`ktp_el` AS `ktp_el`,`gabungan`.`tweb_penduduk`.`status_rekam` AS `status_rekam`,`gabungan`.`tweb_penduduk`.`waktu_lahir` AS `waktu_lahir`,`gabungan`.`tweb_penduduk`.`tempat_dilahirkan` AS `tempat_dilahirkan`,`gabungan`.`tweb_penduduk`.`jenis_kelahiran` AS `jenis_kelahiran`,`gabungan`.`tweb_penduduk`.`kelahiran_anak_ke` AS `kelahiran_anak_ke`,`gabungan`.`tweb_penduduk`.`penolong_kelahiran` AS `penolong_kelahiran`,`gabungan`.`tweb_penduduk`.`berat_lahir` AS `berat_lahir`,`gabungan`.`tweb_penduduk`.`panjang_lahir` AS `panjang_lahir`,`gabungan`.`tweb_penduduk`.`tag_id_card` AS `tag_id_card`,`gabungan`.`tweb_penduduk`.`created_at` AS `created_at`,`gabungan`.`tweb_penduduk`.`created_by` AS `created_by`,`gabungan`.`tweb_penduduk`.`updated_at` AS `updated_at`,`gabungan`.`tweb_penduduk`.`updated_by` AS `updated_by`,`gabungan`.`tweb_penduduk`.`id_asuransi` AS `id_asuransi`,`gabungan`.`tweb_penduduk`.`no_asuransi` AS `no_asuransi`,`gabungan`.`tweb_penduduk`.`email` AS `email`,`gabungan`.`tweb_penduduk`.`email_token` AS `email_token`,`gabungan`.`tweb_penduduk`.`email_tgl_kadaluarsa` AS `email_tgl_kadaluarsa`,`gabungan`.`tweb_penduduk`.`email_tgl_verifikasi` AS `email_tgl_verifikasi`,`gabungan`.`tweb_penduduk`.`telegram` AS `telegram`,`gabungan`.`tweb_penduduk`.`telegram_token` AS `telegram_token`,`gabungan`.`tweb_penduduk`.`telegram_tgl_kadaluarsa` AS `telegram_tgl_kadaluarsa`,`gabungan`.`tweb_penduduk`.`telegram_tgl_verifikasi` AS `telegram_tgl_verifikasi`,`gabungan`.`tweb_penduduk`.`bahasa_id` AS `bahasa_id`,`gabungan`.`tweb_penduduk`.`ket` AS `ket`,`gabungan`.`tweb_penduduk`.`negara_asal` AS `negara_asal`,`gabungan`.`tweb_penduduk`.`tempat_cetak_ktp` AS `tempat_cetak_ktp`,`gabungan`.`tweb_penduduk`.`tanggal_cetak_ktp` AS `tanggal_cetak_ktp`,`gabungan`.`tweb_penduduk`.`suku` AS `suku`,`gabungan`.`tweb_penduduk`.`bpjs_ketenagakerjaan` AS `bpjs_ketenagakerjaan`,`gabungan`.`tweb_penduduk`.`hubung_warga` AS `hubung_warga` from `gabungan`.`tweb_penduduk` where (`gabungan`.`tweb_penduduk`.`status_dasar` = 1)");
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
