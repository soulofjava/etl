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
        $database = env('DB_DATABASE'); // Mengambil nama database dari .env

        DB::statement("DROP VIEW IF EXISTS penduduk_hidup");
        DB::statement("CREATE VIEW `penduduk_hidup` AS
            SELECT
                `{$database}`.`tweb_penduduk`.`id` AS `id`,
                `{$database}`.`tweb_penduduk`.`config_id` AS `config_id`,
                `{$database}`.`tweb_penduduk`.`nama` AS `nama`,
                `{$database}`.`tweb_penduduk`.`nik` AS `nik`,
                `{$database}`.`tweb_penduduk`.`id_kk` AS `id_kk`,
                `{$database}`.`tweb_penduduk`.`kk_level` AS `kk_level`,
                `{$database}`.`tweb_penduduk`.`id_rtm` AS `id_rtm`,
                `{$database}`.`tweb_penduduk`.`rtm_level` AS `rtm_level`,
                `{$database}`.`tweb_penduduk`.`sex` AS `sex`,
                `{$database}`.`tweb_penduduk`.`tempatlahir` AS `tempatlahir`,
                `{$database}`.`tweb_penduduk`.`tanggallahir` AS `tanggallahir`,
                `{$database}`.`tweb_penduduk`.`agama_id` AS `agama_id`,
                `{$database}`.`tweb_penduduk`.`pendidikan_kk_id` AS `pendidikan_kk_id`,
                `{$database}`.`tweb_penduduk`.`pendidikan_sedang_id` AS `pendidikan_sedang_id`,
                `{$database}`.`tweb_penduduk`.`pekerjaan_id` AS `pekerjaan_id`,
                `{$database}`.`tweb_penduduk`.`status_kawin` AS `status_kawin`,
                `{$database}`.`tweb_penduduk`.`warganegara_id` AS `warganegara_id`,
                `{$database}`.`tweb_penduduk`.`dokumen_pasport` AS `dokumen_pasport`,
                `{$database}`.`tweb_penduduk`.`dokumen_kitas` AS `dokumen_kitas`,
                `{$database}`.`tweb_penduduk`.`ayah_nik` AS `ayah_nik`,
                `{$database}`.`tweb_penduduk`.`ibu_nik` AS `ibu_nik`,
                `{$database}`.`tweb_penduduk`.`nama_ayah` AS `nama_ayah`,
                `{$database}`.`tweb_penduduk`.`nama_ibu` AS `nama_ibu`,
                `{$database}`.`tweb_penduduk`.`foto` AS `foto`,
                `{$database}`.`tweb_penduduk`.`golongan_darah_id` AS `golongan_darah_id`,
                `{$database}`.`tweb_penduduk`.`id_cluster` AS `id_cluster`,
                `{$database}`.`tweb_penduduk`.`status` AS `status`,
                `{$database}`.`tweb_penduduk`.`alamat_sebelumnya` AS `alamat_sebelumnya`,
                `{$database}`.`tweb_penduduk`.`alamat_sekarang` AS `alamat_sekarang`,
                `{$database}`.`tweb_penduduk`.`status_dasar` AS `status_dasar`,
                `{$database}`.`tweb_penduduk`.`hamil` AS `hamil`,
                `{$database}`.`tweb_penduduk`.`cacat_id` AS `cacat_id`,
                `{$database}`.`tweb_penduduk`.`sakit_menahun_id` AS `sakit_menahun_id`,
                `{$database}`.`tweb_penduduk`.`akta_lahir` AS `akta_lahir`,
                `{$database}`.`tweb_penduduk`.`akta_perkawinan` AS `akta_perkawinan`,
                `{$database}`.`tweb_penduduk`.`tanggalperkawinan` AS `tanggalperkawinan`,
                `{$database}`.`tweb_penduduk`.`akta_perceraian` AS `akta_perceraian`,
                `{$database}`.`tweb_penduduk`.`tanggalperceraian` AS `tanggalperceraian`,
                `{$database}`.`tweb_penduduk`.`cara_kb_id` AS `cara_kb_id`,
                `{$database}`.`tweb_penduduk`.`telepon` AS `telepon`,
                `{$database}`.`tweb_penduduk`.`tanggal_akhir_paspor` AS `tanggal_akhir_paspor`,
                `{$database}`.`tweb_penduduk`.`no_kk_sebelumnya` AS `no_kk_sebelumnya`,
                `{$database}`.`tweb_penduduk`.`ktp_el` AS `ktp_el`,
                `{$database}`.`tweb_penduduk`.`status_rekam` AS `status_rekam`,
                `{$database}`.`tweb_penduduk`.`waktu_lahir` AS `waktu_lahir`,
                `{$database}`.`tweb_penduduk`.`tempat_dilahirkan` AS `tempat_dilahirkan`,
                `{$database}`.`tweb_penduduk`.`jenis_kelahiran` AS `jenis_kelahiran`,
                `{$database}`.`tweb_penduduk`.`kelahiran_anak_ke` AS `kelahiran_anak_ke`,
                `{$database}`.`tweb_penduduk`.`penolong_kelahiran` AS `penolong_kelahiran`,
                `{$database}`.`tweb_penduduk`.`berat_lahir` AS `berat_lahir`,
                `{$database}`.`tweb_penduduk`.`panjang_lahir` AS `panjang_lahir`,
                `{$database}`.`tweb_penduduk`.`tag_id_card` AS `tag_id_card`,
                `{$database}`.`tweb_penduduk`.`created_at` AS `created_at`,
                `{$database}`.`tweb_penduduk`.`created_by` AS `created_by`,
                `{$database}`.`tweb_penduduk`.`updated_at` AS `updated_at`,
                `{$database}`.`tweb_penduduk`.`updated_by` AS `updated_by`,
                `{$database}`.`tweb_penduduk`.`id_asuransi` AS `id_asuransi`,
                `{$database}`.`tweb_penduduk`.`no_asuransi` AS `no_asuransi`,
                `{$database}`.`tweb_penduduk`.`email` AS `email`,
                `{$database}`.`tweb_penduduk`.`email_token` AS `email_token`,
                `{$database}`.`tweb_penduduk`.`email_tgl_kadaluarsa` AS `email_tgl_kadaluarsa`,
                `{$database}`.`tweb_penduduk`.`email_tgl_verifikasi` AS `email_tgl_verifikasi`,
                `{$database}`.`tweb_penduduk`.`telegram` AS `telegram`,
                `{$database}`.`tweb_penduduk`.`telegram_token` AS `telegram_token`,
                `{$database}`.`tweb_penduduk`.`telegram_tgl_kadaluarsa` AS `telegram_tgl_kadaluarsa`,
                `{$database}`.`tweb_penduduk`.`telegram_tgl_verifikasi` AS `telegram_tgl_verifikasi`,
                `{$database}`.`tweb_penduduk`.`bahasa_id` AS `bahasa_id`,
                `{$database}`.`tweb_penduduk`.`ket` AS `ket`,
                `{$database}`.`tweb_penduduk`.`negara_asal` AS `negara_asal`,
                `{$database}`.`tweb_penduduk`.`tempat_cetak_ktp` AS `tempat_cetak_ktp`,
                `{$database}`.`tweb_penduduk`.`tanggal_cetak_ktp` AS `tanggal_cetak_ktp`,
                `{$database}`.`tweb_penduduk`.`suku` AS `suku`,
                `{$database}`.`tweb_penduduk`.`bpjs_ketenagakerjaan` AS `bpjs_ketenagakerjaan`,
                `{$database}`.`tweb_penduduk`.`hubung_warga` AS `hubung_warga`
            FROM
                `{$database}`.`tweb_penduduk`
            WHERE
                `{$database}`.`tweb_penduduk`.`status_dasar` = 1
        ");
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
