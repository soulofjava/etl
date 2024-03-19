<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Asal\TanahDesa;
use App\Models\Asal\TanahKasDesa;
use App\Models\Asal\TeksBerjalan;
use App\Models\Asal\TwebAset;
use App\Models\Asal\TwebCacat;
use App\Models\Asal\TwebCaraKb;
use App\Models\Asal\TwebDesaPamong;
use App\Models\Asal\TwebGolonganDarah;
use App\Models\Asal\TwebKeluargaSejahtera;
use App\Models\Asal\TwebPenduduk;
use App\Models\Asal\TwebPendudukAgama;
use App\Models\Asal\TwebPendudukAsuransi;
use App\Models\Asal\TwebPendudukHubungan;
use App\Models\Asal\TwebPendudukKawin;
use App\Models\Asal\TwebPendudukPekerjaan;
use App\Models\Asal\TwebPendudukPendidikan;
use App\Models\Asal\TwebPendudukPendidikanKk;
use App\Models\Asal\TwebPendudukSex;
use App\Models\Asal\TwebPendudukStatus;
use App\Models\Asal\TwebPendudukUmur;
use App\Models\Asal\TwebPendudukWarganegara;
use App\Models\Asal\TwebRtm;
use App\Models\Asal\TwebRtmHubungan;
use App\Models\Asal\TwebSakitMenahun;
use App\Models\Asal\TwebStatusDasar;
use App\Models\Asal\TwebStatusKtp;
use App\Models\Asal\TwebSuratFormat;
use App\Models\Asal\TwebWilClusterdesa;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\LogSurat;
use App\Models\Tujuan\TanahDesa as TujuanTanahDesa;
use App\Models\Tujuan\TanahKasDesa as TujuanTanahKasDesa;
use App\Models\Tujuan\TeksBerjalan as TujuanTeksBerjalan;
use App\Models\Tujuan\TwebAset as TujuanTwebAset;
use App\Models\Tujuan\TwebCacat as TujuanTwebCacat;
use App\Models\Tujuan\TwebCaraKb as TujuanTwebCaraKb;
use App\Models\Tujuan\TwebDesaPamong as TujuanTwebDesaPamong;
use App\Models\Tujuan\TwebGolonganDarah as TujuanTwebGolonganDarah;
use App\Models\Tujuan\TwebKeluargaSejahtera as TujuanTwebKeluargaSejahtera;
use App\Models\Tujuan\TwebPenduduk as TujuanTwebPenduduk;
use App\Models\Tujuan\TwebPendudukAgama as TujuanTwebPendudukAgama;
use App\Models\Tujuan\TwebPendudukAsuransi as TujuanTwebPendudukAsuransi;
use App\Models\Tujuan\TwebPendudukHubungan as TujuanTwebPendudukHubungan;
use App\Models\Tujuan\TwebPendudukKawin as TujuanTwebPendudukKawin;
use App\Models\Tujuan\TwebPendudukPekerjaan as TujuanTwebPendudukPekerjaan;
use App\Models\Tujuan\TwebPendudukPendidikan as TujuanTwebPendudukPendidikan;
use App\Models\Tujuan\TwebPendudukPendidikanKk as TujuanTwebPendudukPendidikanKk;
use App\Models\Tujuan\TwebPendudukSex as TujuanTwebPendudukSex;
use App\Models\Tujuan\TwebPendudukStatus as TujuanTwebPendudukStatus;
use App\Models\Tujuan\TwebPendudukUmur as TujuanTwebPendudukUmur;
use App\Models\Tujuan\TwebPendudukWarganegara as TujuanTwebPendudukWarganegara;
use App\Models\Tujuan\TwebRtm as TujuanTwebRtm;
use App\Models\Tujuan\TwebRtmHubungan as TujuanTwebRtmHubungan;
use App\Models\Tujuan\TwebSakitMenahun as TujuanTwebSakitMenahun;
use App\Models\Tujuan\TwebStatusDasar as TujuanTwebStatusDasar;
use App\Models\Tujuan\TwebStatusKtp as TujuanTwebStatusKtp;
use App\Models\Tujuan\TwebSuratFormat as TujuanTwebSuratFormat;
use App\Models\Tujuan\TwebWilClusterdesa as TujuanTwebWilClusterdesa;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class TCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:t-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $setConfigId = '';
        $this->info('pindah table config');
        $config = Config::all();
        foreach ($config as $item) {
            // $item->config_id = $setConfigId;
            //cek dulu config nya
            $cek = TujuanConfig::where('app_key', $item->app_key)->first();
            $this->info($item->app_key);
            if (!$cek) {
                $this->info('app tidak ditemukan');
                $a = TujuanConfig::create($item->toArray());
                $setConfigId = $a->id;
            } else {
                $this->info('app key ditemukan');
                $setConfigId = $cek->id;
            }
        }

        LogSurat::where('config_id',  $setConfigId)->delete();

        $this->info('pindah table tanah_desa');
        TujuanTanahDesa::where('config_id',  $setConfigId)->delete();
        $a = TanahDesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTanahDesa::create($item->toArray());
        }

        $this->info('pindah table tanah_kas_desa');
        TujuanTanahKasDesa::where('config_id',  $setConfigId)->delete();
        $a = TanahKasDesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTanahKasDesa::create($item->toArray());
        }

        $this->info('pindah table teks_berjalan');
        TujuanTeksBerjalan::where('config_id',  $setConfigId)->delete();
        $a = TeksBerjalan::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTeksBerjalan::create($item->toArray());
        }

        $this->info('pindah table tweb_penduduk_umur');
        TujuanTwebPendudukUmur::where('config_id',  $setConfigId)->delete();
        $a = TwebPendudukUmur::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTwebPendudukUmur::create($item->toArray());
        }

        // $this->info('pindah table tweb_rtm');
        // $a = TwebRtm::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     TujuanTwebRtm::create($item->toArray());
        // }

        $this->info('pindah table tweb_surat_format');
        LogSurat::where('config_id',  $setConfigId)->delete();
        TujuanTwebSuratFormat::where('config_id',  $setConfigId)->delete();
        $aa = TwebSuratFormat::with('log_surat')->get();
        foreach ($aa as $asal) {
            $isiantwebsuratformat = Arr::except($asal->toArray(), ['id']);
            $isiantwebsuratformat['config_id'] = $setConfigId;
            $fs = TujuanTwebSuratFormat::create($isiantwebsuratformat);

            if ($asal->log_surat) {
                foreach ($asal->log_surat as $item) {
                    $id_pend = TwebPenduduk::where('id', $item->id_pend)->first();
                    if ($id_pend) {
                        $d_id_pend = TujuanTwebPenduduk::where('nik', $id_pend->nik)->first();
                    }
                    $id_pamong = TwebDesaPamong::where('pamong_id', $item->id_pamong)->first();
                    $id_pend_pamong = TwebPenduduk::where('id', $id_pamong->id_pend)->first();
                    $d_id_pend_pamong = TujuanTwebPenduduk::where('nik', $id_pend_pamong->nik)->first();
                    $d_id_pamong = TujuanTwebDesaPamong::where('id_pend', $d_id_pend_pamong->id)->first();

                    $isianlogsurat = Arr::except($item->toArray(), ['id', 'urls_id', 'id_format_surat']);
                    $isianlogsurat['config_id'] = $setConfigId;
                    $isianlogsurat['id_pend'] = $d_id_pend->id ?? null;
                    $isianlogsurat['id_pamong'] = $d_id_pamong->pamong_id;
                    $fs->log_surat()->create($isianlogsurat);
                }
            }
        }

        $this->info('pindah table tweb_wil_clusterdesa');
        TujuanTwebWilClusterdesa::where('config_id',  $setConfigId)->delete();
        $a = TwebWilClusterdesa::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanTwebWilClusterdesa::create($item->toArray());
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_aset');
        $a = TwebAset::all();
        foreach ($a as $item) {
            $b = TujuanTwebAset::where('id_aset', $item->id_aset)->first();
            if (!$b) {
                TujuanTwebAset::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_cacat');
        $a = TwebCacat::all();
        foreach ($a as $item) {
            $b = TujuanTwebCacat::find($item->id);
            if (!$b) {
                TujuanTwebCacat::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_cara_kb');
        $a = TwebCaraKb::all();
        foreach ($a as $item) {
            $b = TujuanTwebCaraKb::find($item->id);
            if (!$b) {
                TujuanTwebCaraKb::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_golongan_darah');
        $a = TwebGolonganDarah::all();
        foreach ($a as $item) {
            $b = TujuanTwebGolonganDarah::find($item->id);
            if (!$b) {
                TujuanTwebGolonganDarah::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_keluarga_sejahtera');
        $a = TwebKeluargaSejahtera::all();
        foreach ($a as $item) {
            $b = TujuanTwebKeluargaSejahtera::find($item->id);
            if (!$b) {
                TujuanTwebKeluargaSejahtera::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_agama');
        $a = TwebPendudukAgama::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukAgama::find($item->id);
            if (!$b) {
                TujuanTwebPendudukAgama::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_asuransi');
        $a = TwebPendudukAsuransi::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukAsuransi::find($item->id);
            if (!$b) {
                TujuanTwebPendudukAsuransi::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_hubungan');
        $a = TwebPendudukHubungan::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukHubungan::find($item->id);
            if (!$b) {
                TujuanTwebPendudukHubungan::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_kawin');
        $a = TwebPendudukKawin::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukKawin::find($item->id);
            if (!$b) {
                TujuanTwebPendudukKawin::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_pekerjaan');
        $a = TwebPendudukPekerjaan::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukPekerjaan::find($item->id);
            if (!$b) {
                TujuanTwebPendudukPekerjaan::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_pendidikan');
        $a = TwebPendudukPendidikan::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukPendidikan::find($item->id);
            if (!$b) {
                TujuanTwebPendudukPendidikan::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_pendidikan_kk');
        $a = TwebPendudukPendidikanKk::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukPendidikanKk::find($item->id);
            if (!$b) {
                TujuanTwebPendudukPendidikanKk::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_sex');
        $a = TwebPendudukSex::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukSex::find($item->id);
            if (!$b) {
                TujuanTwebPendudukSex::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_status');
        $a = TwebPendudukStatus::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukStatus::find($item->id);
            if (!$b) {
                TujuanTwebPendudukStatus::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_penduduk_warganegara');
        $a = TwebPendudukWarganegara::all();
        foreach ($a as $item) {
            $b = TujuanTwebPendudukWarganegara::find($item->id);
            if (!$b) {
                TujuanTwebPendudukWarganegara::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_rtm_hubungan');
        $a = TwebRtmHubungan::all();
        foreach ($a as $item) {
            $b = TujuanTwebRtmHubungan::find($item->id);
            if (!$b) {
                TujuanTwebRtmHubungan::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_sakit_menahun');
        $a = TwebSakitMenahun::all();
        foreach ($a as $item) {
            $b = TujuanTwebSakitMenahun::find($item->id);
            if (!$b) {
                TujuanTwebSakitMenahun::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_status_dasar');
        $a = TwebStatusDasar::all();
        foreach ($a as $item) {
            $b = TujuanTwebStatusDasar::find($item->id);
            if (!$b) {
                TujuanTwebStatusDasar::create($item->toArray());
            }
        }

        //insert yang tidak menggunakan config_id
        $this->info('pindah table tweb_status_ktp');
        $a = TwebStatusKtp::all();
        foreach ($a as $item) {
            $b = TujuanTwebStatusKtp::find($item->id);
            if (!$b) {
                TujuanTwebStatusKtp::create($item->toArray());
            }
        }
    }
}
