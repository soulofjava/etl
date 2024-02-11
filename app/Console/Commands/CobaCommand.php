<?php

namespace App\Console\Commands;

use App\Models\Asal\Config as AsalConfig;
use App\Models\Asal\Pelapak;
use App\Models\Asal\Pesan;
use App\Models\Asal\PesanDetail;
use App\Models\Asal\Posyandu;
use App\Models\Asal\Produk;
use App\Models\Asal\ProdukKategori;
use App\Models\Asal\Program;
use App\Models\Asal\ProgramPesertum;
use App\Models\Asal\RefJabatan;
use App\Models\Asal\RefSyaratSurat;
use App\Models\Asal\SasaranPaud;
use App\Models\Asal\Sentitem;
use App\Models\Asal\SettingAplikasi;
use App\Models\Asal\SettingModul;
use App\Models\Asal\Statistic;
use App\Models\Asal\Supleman;
use App\Models\Asal\SuplemenTerdatum;
use App\Models\Asal\SuratKeluar;
use App\Models\Asal\SuratMasuk;
use App\Models\Asal\SysTraffic;
use App\Models\Asal\TanahDesa;
use App\Models\Asal\TanahKasDesa;
use App\Models\Asal\TeksBerjalan;
use App\Models\Asal\TwebDesaPamong;
use App\Models\Asal\TwebKeluarga;
use App\Models\Asal\TwebPenduduk;
use App\Models\Asal\TwebPendudukMandiri;
use App\Models\Asal\TwebPendudukUmur;
use App\Models\Asal\TwebRtm;
use App\Models\Asal\TwebSuratFormat;
use App\Models\Asal\TwebWilClusterdesa;
use App\Models\Asal\Url;
use App\Models\Asal\User;
use App\Models\Asal\UserGrup;
use App\Models\Asal\Widget;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Tujuan\Pelapak as TujuanPelapak;
use App\Models\Tujuan\Pesan as TujuanPesan;
use App\Models\Tujuan\PesanDetail as TujuanPesanDetail;
use App\Models\Tujuan\Posyandu as TujuanPosyandu;
use App\Models\Tujuan\Produk as TujuanProduk;
use App\Models\Tujuan\ProdukKategori as TujuanProdukKategori;
use App\Models\Tujuan\Program as TujuanProgram;
use App\Models\Tujuan\ProgramPesertum as TujuanProgramPesertum;
use App\Models\Tujuan\RefJabatan as TujuanRefJabatan;
use App\Models\Tujuan\RefSyaratSurat as TujuanRefSyaratSurat;
use App\Models\Tujuan\SasaranPaud as TujuanSasaranPaud;
use App\Models\Tujuan\Sentitem as TujuanSentitem;
use App\Models\Tujuan\SettingAplikasi as TujuanSettingAplikasi;
use App\Models\Tujuan\Statistic as TujuanStatistic;
use App\Models\Tujuan\Supleman as TujuanSupleman;
use App\Models\Tujuan\SuplemenTerdatum as TujuanSuplemenTerdatum;
use App\Models\Tujuan\SuratKeluar as TujuanSuratKeluar;
use App\Models\Tujuan\SuratMasuk as TujuanSuratMasuk;
use App\Models\Tujuan\SysTraffic as TujuanSysTraffic;
use App\Models\Tujuan\TanahDesa as TujuanTanahDesa;
use App\Models\Tujuan\TanahKasDesa as TujuanTanahKasDesa;
use App\Models\Tujuan\TeksBerjalan as TujuanTeksBerjalan;
use App\Models\Tujuan\TwebKeluarga as TujuanTwebKeluarga;
use App\Models\Tujuan\TwebPenduduk as TujuanTwebPenduduk;
use App\Models\Tujuan\TwebPendudukMandiri as TujuanTwebPendudukMandiri;
use App\Models\Tujuan\TwebPendudukUmur as TujuanTwebPendudukUmur;
use App\Models\Tujuan\TwebRtm as TujuanTwebRtm;
use App\Models\Tujuan\TwebSuratFormat as TujuanTwebSuratFormat;
use App\Models\Tujuan\TwebWilClusterdesa as TujuanTwebWilClusterdesa;
use App\Models\Tujuan\Url as TujuanUrl;
use App\Models\Tujuan\User as TujuanUser;
use App\Models\Tujuan\UserGrup as TujuanUserGrup;
use App\Models\Tujuan\Widget as TujuanWidget;
use Illuminate\Console\Command;

class CobaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:coba';

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
        $config = AsalConfig::all();
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

        $this->info('pindah table pesan');
        $a = Pesan::all();
        foreach ($a as $pesan) {
            // Set the new config_id
            $pesan->config_id = $setConfigId;

            // Create a new record in TujuanPesan
            $tujuanPesan = TujuanPesan::create($pesan->toArray());

            // Find the related PesanDetail
            $pesanDetail = PesanDetail::where('pesan_id', $pesan->id)->first();

            // If PesanDetail exists, create a new record in TujuanPesanDetail
            if ($pesanDetail) {
                // Update pesan_id to the newly created TujuanPesan record
                $pesanDetail->pesan_id = $tujuanPesan->id;
                $pesanDetail->config_id = $setConfigId; // Set the new config_id if needed

                // Create a new record in TujuanPesanDetail
                TujuanPesanDetail::create($pesanDetail->toArray());
            }
        }

        $this->info('pindah table posyandu');
        $a = Posyandu::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            TujuanPosyandu::create($item->toArray());
        }

        // Parent
        $this->info('pindah table tweb_penduduk');
        $a = TwebPenduduk::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            // $cek = TujuanTwebPenduduk::where('config_id', $setConfigId)->first();
            // if (!$cek) {
            TujuanTwebPenduduk::create($item->toArray());
            // }
        }

        $this->info('pindah table produk_kategori');
        $a = ProdukKategori::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            // $cek = TujuanProdukKategori::where('config_id', $setConfigId)->first();
            // if ($cek) {
            TujuanProdukKategori::create($item->toArray());
            // }
        }

        $this->info('pindah table pelapak');
        $a = Pelapak::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            // $cek = TujuanPelapak::where('config_id', $setConfigId)->first();
            // if ($cek) {
            TujuanPelapak::create($item->toArray());
            // }
        }

        $this->info('pindah table produk');
        $a = Produk::all();
        foreach ($a as $item) {
            $item->config_id = $setConfigId;
            // $cek = TujuanProduk::where('config_id', $setConfigId)->first();
            // if ($cek) {
            TujuanProduk::create($item->toArray());
            // }
        }

        // $this->info('pindah table program');
        // $a = Program::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanProgram::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanProgram::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table program_peserta');
        // $a = ProgramPesertum::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanProgramPesertum::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanProgramPesertum::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table ref_jabatan');
        // $a = RefJabatan::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanRefJabatan::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanRefJabatan::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table ref_syarat_surat');
        // $a = RefSyaratSurat::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanRefSyaratSurat::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanRefSyaratSurat::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table sasaran_paud');
        // $a = SasaranPaud::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSasaranPaud::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSasaranPaud::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table sentitems');
        // $a = Sentitem::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSentitem::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSentitem::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table setting_aplikasi');
        // $a = SettingAplikasi::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSettingAplikasi::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSettingAplikasi::create($item->toArray());
        //     }
        // }

        // // $this->info('pindah table setting_modul');
        // // $a = SettingModul::all();
        // // foreach ($a as $item) {
        // //     $item->config_id = $setConfigId;
        // //     $cek = SettingModul::where('config_id', $setConfigId)->first();
        // //     if ($cek) {
        // //         SettingModul::create($item->toArray());
        // //     }
        // // }

        // $this->info('pindah table statistics');
        // $a = Statistic::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanStatistic::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanStatistic::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table suplemen');
        // $a = Supleman::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSupleman::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSupleman::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table suplemen_terdata');
        // $a = SuplemenTerdatum::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSuplemenTerdatum::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSuplemenTerdatum::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table surat_keluar');
        // $a = SuratKeluar::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSuratKeluar::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSuratKeluar::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table surat_masuk');
        // $a = SuratMasuk::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanSuratMasuk::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanSuratMasuk::create($item->toArray());
        //     }
        // }

        // // $this->info('pindah table sys_traffic');
        // // $a = SysTraffic::all();
        // // foreach ($a as $item) {
        // //     $item->config_id = $setConfigId;
        // //     $cek = TujuanSysTraffic::where('config_id', $setConfigId)->first();
        // //     if ($cek) {
        // //         TujuanSysTraffic::create($item->toArray());
        // //     }
        // // }


        // $this->info('pindah table tanah_desa');
        // $a = TanahDesa::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTanahDesa::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTanahDesa::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tanah_kas_desa');
        // $a = TanahKasDesa::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTanahKasDesa::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTanahKasDesa::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table teks_berjalan');
        // $a = TeksBerjalan::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTeksBerjalan::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTeksBerjalan::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_desa_pamong');
        // $a = TwebDesaPamong::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TwebDesaPamong::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TwebDesaPamong::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_keluarga');
        // $a = TwebKeluarga::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTwebKeluarga::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTwebKeluarga::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_penduduk_mandiri');
        // $a = TwebPendudukMandiri::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTwebPendudukMandiri::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTwebPendudukMandiri::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_penduduk_umur');
        // $a = TwebPendudukUmur::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTwebPendudukUmur::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTwebPendudukUmur::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_rtm');
        // $a = TwebRtm::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTwebRtm::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTwebRtm::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_surat_format');
        // $a = TwebSuratFormat::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTwebSuratFormat::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTwebSuratFormat::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table tweb_wil_clusterdesa');
        // $a = TwebWilClusterdesa::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanTwebWilClusterdesa::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanTwebWilClusterdesa::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table urls');
        // $a = Url::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanUrl::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanUrl::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table user');
        // $a = User::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanUser::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanUser::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table user_grup');
        // $a = UserGrup::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanUserGrup::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanUserGrup::create($item->toArray());
        //     }
        // }

        // $this->info('pindah table widget');
        // $a = Widget::all();
        // foreach ($a as $item) {
        //     $item->config_id = $setConfigId;
        //     $cek = TujuanWidget::where('config_id', $setConfigId)->first();
        //     if ($cek) {
        //         TujuanWidget::create($item->toArray());
        //     }
        // }
    }
}
