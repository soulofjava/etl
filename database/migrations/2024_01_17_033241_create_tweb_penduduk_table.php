<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweb_penduduk', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable();
            $table->string('nama', 100);
            $table->string('nik', 16)->nullable();
            $table->integer('id_kk')->nullable()->default(0);
            $table->tinyInteger('kk_level')->nullable();
            $table->string('id_rtm', 30)->nullable()->index('id_rtm');
            $table->integer('rtm_level')->nullable();
            $table->unsignedTinyInteger('sex')->nullable();
            $table->string('tempatlahir', 100)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->integer('agama_id')->nullable();
            $table->integer('pendidikan_kk_id')->nullable();
            $table->integer('pendidikan_sedang_id')->nullable();
            $table->integer('pekerjaan_id')->nullable();
            $table->tinyInteger('status_kawin')->nullable();
            $table->tinyInteger('warganegara_id')->default(1);
            $table->string('dokumen_pasport', 45)->nullable();
            $table->string('dokumen_kitas', 45)->nullable();
            $table->string('ayah_nik', 16)->nullable();
            $table->string('ibu_nik', 16)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->integer('golongan_darah_id')->nullable();
            $table->integer('id_cluster');
            $table->unsignedInteger('status')->nullable();
            $table->string('alamat_sebelumnya', 200)->nullable();
            $table->string('alamat_sekarang', 200)->nullable();
            $table->tinyInteger('status_dasar')->default(1);
            $table->integer('hamil')->nullable();
            $table->integer('cacat_id')->nullable();
            $table->integer('sakit_menahun_id')->nullable();
            $table->string('akta_lahir', 40)->nullable();
            $table->string('akta_perkawinan', 40)->nullable();
            $table->date('tanggalperkawinan')->nullable();
            $table->string('akta_perceraian', 40)->nullable();
            $table->date('tanggalperceraian')->nullable();
            $table->tinyInteger('cara_kb_id')->nullable();
            $table->string('telepon', 20)->nullable();
            $table->date('tanggal_akhir_paspor')->nullable();
            $table->string('no_kk_sebelumnya', 30)->nullable();
            $table->tinyInteger('ktp_el')->nullable();
            $table->tinyInteger('status_rekam')->nullable();
            $table->string('waktu_lahir', 5)->nullable();
            $table->tinyInteger('tempat_dilahirkan')->nullable();
            $table->tinyInteger('jenis_kelahiran')->nullable();
            $table->tinyInteger('kelahiran_anak_ke')->nullable();
            $table->tinyInteger('penolong_kelahiran')->nullable();
            $table->smallInteger('berat_lahir')->nullable();
            $table->string('panjang_lahir', 10)->nullable();
            $table->string('tag_id_card', 17)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('created_by');
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('id_asuransi')->nullable();
            $table->char('no_asuransi', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('email_token', 100)->nullable();
            $table->dateTime('email_tgl_kadaluarsa')->nullable();
            $table->dateTime('email_tgl_verifikasi')->nullable();
            $table->string('telegram', 100)->nullable();
            $table->string('telegram_token', 100)->nullable();
            $table->dateTime('telegram_tgl_kadaluarsa')->nullable();
            $table->dateTime('telegram_tgl_verifikasi')->nullable();
            $table->integer('bahasa_id')->nullable();
            $table->tinyText('ket')->nullable();
            $table->string('negara_asal', 50)->nullable();
            $table->string('tempat_cetak_ktp', 150)->nullable();
            $table->date('tanggal_cetak_ktp')->nullable();
            $table->string('suku', 150)->nullable();
            $table->char('bpjs_ketenagakerjaan', 100)->nullable();
            $table->string('hubung_warga', 50)->nullable()->index('hubung_warga');

            $table->unique(['config_id', 'telegram_token'], 'telegram_token_config');
            $table->unique(['config_id', 'email_token'], 'email_token_config');
            $table->unique(['config_id', 'email'], 'email_config');
            $table->unique(['config_id', 'nik'], 'nik_config');
            $table->unique(['config_id', 'tag_id_card'], 'tag_id_card_config');
            $table->unique(['config_id', 'telegram'], 'telegram_config');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweb_penduduk');
    }
};
