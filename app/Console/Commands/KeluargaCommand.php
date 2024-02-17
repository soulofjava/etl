<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\TwebKeluarga as AsalKeluarga;
use App\Models\Tujuan\TwebKeluarga as TujuanKeluarga;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\Config;
use App\Models\Tujuan\Dtk;
use App\Models\Tujuan\Pelapak;
use App\Models\Tujuan\Produk;
use App\Models\Tujuan\ProdukKategori;
use App\Models\Tujuan\Program;
use App\Models\Tujuan\ProgramPesertum;
use App\Models\Tujuan\TwebPenduduk;
use App\Models\Tujuan\TwebRtm;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class KeluargaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:keluarga-command';

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
        DB::transaction(function () {
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

            TujuanKeluarga::where('config_id',  $setConfigId)->delete();
            TwebPenduduk::where('config_id',  $setConfigId)->delete();
            Dtk::where('config_id',  $setConfigId)->delete();
            TwebRtm::where('config_id',  $setConfigId)->delete();
            Pelapak::where('config_id',  $setConfigId)->delete();
            Produk::where('config_id',  $setConfigId)->delete();
            ProdukKategori::where('config_id',  $setConfigId)->delete();
            ProgramPesertum::where('config_id',  $setConfigId)->delete();
            Program::where('config_id',  $setConfigId)->delete();
            $data = AsalKeluarga::with(['penduduk' => function ($a) {
                $a->with(['dtks', 'dtks_anggota', 'rtm', 'pelapak' => function ($b) {
                    $b->with(['produks' => function ($c) {
                        $c->with(['produk_kategori']);
                    }]);
                }, 'program_peserta'  => function ($c) {
                    $c->with(['program']);
                }]);
            }, 'dtks'])->get();

            foreach ($data as $asal) {

                $asalnya = Arr::except($asal->toArray(), ['id']);
                $asalnya['config_id'] =   $setConfigId;
                // $this->info('masukkan keluarga');
                $a = TujuanKeluarga::create($asalnya);
                foreach ($asal->dtks ?? [] as $dtks) {
                    // echo $a->id."\n";
                    $isidtks = Arr::except($dtks->toArray(), ['id']);
                    $isidtks['config_id'] =  $setConfigId;
                    // $isidtks['id_keluarga'] =  $a->id;

                    // $this->info('masukkan dtks');
                    $hasildtks = $a->dtks()->create($isidtks);
                }
                foreach ($asal->penduduk as $penduduk) {
                    $isian = $penduduk->toArray();
                    $isian = Arr::except($isian, ['id_kk', 'dtks', 'dtks_anggota', 'id', 'rtm', 'pelapak']);
                    $isian['config_id'] =  $setConfigId;

                    // $this->info('masukkan penduduk');
                    $pendu =  $a->penduduk()->create($isian);
                    // masukkan rtm
                    if ($penduduk->rtm) {
                        $rtm = Arr::except($penduduk->rtm->toArray(), ['id', 'nik_kepala']);
                        $rtm['config_id'] =  $setConfigId;

                        $rtm =   $pendu->rtm()->create($rtm);
                    }

                    // masukkan anggota dtks
                    foreach ($penduduk->dtks_anggota ?? [] as $anggotadt) {
                        $isianggotadt = Arr::except($anggotadt->toArray(), ['id_dtks', 'id']);
                        $isianggotadt['config_id'] =  $setConfigId;
                        $isianggotadt['id_penduduk'] =  $pendu->id;
                        $isianggotadt['id_keluarga'] =  $a->id;
                        $isianggotadt['id_dtks'] =  $hasildtks->id;
                        $isianggotadt['id_rtm'] =  $rtm->id ?? null;
                        // $this->info('masukkan anggota dtks');
                        $pendu->dtks_anggota()->create($isianggotadt);
                    }
                    // masukkan pelapak
                    if ($penduduk->pelapak) {
                        $isianpelapak = Arr::except($penduduk->pelapak->toArray(), ['id_pend', 'id']);
                        $isianpelapak['config_id'] = $setConfigId;
                        $isianpelapak['id_pend'] = $pendu->id;
                        $pela = $pendu->pelapak()->create($isianpelapak);

                        // masukkan produk
                        if ($penduduk->pelapak->produks) {
                            foreach ($penduduk->pelapak->produks as $pro) {
                                // Create or retrieve a record in the 'produk_kategori' table
                                $isiankategori = Arr::except($pro->produk_kategori->toArray(), ['id']);
                                $isiankategori['config_id'] = $setConfigId;
                                $kat = ProdukKategori::firstOrCreate($isiankategori);

                                // Create a new record in the 'produk' table
                                $isianproduk = Arr::except($pro->toArray(), ['id_produk_kategori', 'id_pelapak', 'id']);
                                $isianproduk['config_id'] = $setConfigId;
                                $isianproduk['id_produk_kategori'] = $kat->id;
                                $isianproduk['id_pelapak'] = $pela->id;

                                // Create the 'produk' record
                                $produk = $pela->produks()->create($isianproduk);
                            }
                        }
                    }

                    // // masukkan program_peserta
                    // if ($penduduk->program_peserta) {
                    //     foreach ($penduduk->program_peserta as $programpeserta) {
                    //         // Extract fields from the associated program, excluding 'id'
                    //         $isianprogram = Arr::except($programpeserta->program->toArray(), ['id']);
                    //         $isianprogram['config_id'] = $setConfigId;
                    //         $prog = Program::firstOrCreate($isianprogram);

                    //         // Extract fields from the program_peserta, excluding 'kartu_id_pend', 'program_id', and 'id'
                    //         $isianprogrampeserta = Arr::except($programpeserta->toArray(), ['kartu_id_pend', 'program_id', 'id']);
                    //         $isianprogrampeserta['config_id'] = $setConfigId;
                    //         $isianprogrampeserta['kartu_id_pend'] = $pendu->id;
                    //         $isianprogrampeserta['program_id'] = $prog->id;

                    //         // Create a new program_peserta associated with the current $pendu object
                    //         $pendu->program_peserta()->create($isianprogrampeserta);
                    //     }
                    // }
                }
            }
        });
    }
}
