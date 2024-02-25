<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asal\TwebKeluarga as AsalKeluarga;
use App\Models\Tujuan\TwebKeluarga as TujuanKeluarga;
use App\Models\Tujuan\Config as TujuanConfig;
use App\Models\Asal\Config;
use App\Models\Tujuan\Dtk;
use App\Models\Tujuan\Kategori;
use App\Models\Tujuan\LogKeluarga;
use App\Models\Tujuan\LogPenduduk;
use App\Models\Tujuan\LogPerubahanPenduduk;
use App\Models\Tujuan\Pelapak;
use App\Models\Tujuan\Produk;
use App\Models\Tujuan\ProdukKategori;
use App\Models\Tujuan\Program;
use App\Models\Tujuan\ProgramPesertum;
use App\Models\Tujuan\RefJabatan;
use App\Models\Tujuan\Supleman;
use App\Models\Tujuan\SuplemenTerdatum;
use App\Models\Tujuan\TwebDesaPamong;
use App\Models\Tujuan\TwebPenduduk;
use App\Models\Tujuan\TwebPendudukMandiri;
use App\Models\Tujuan\TwebRtm;
use App\Models\Tujuan\UserGrup;
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
            LogKeluarga::where('config_id',  $setConfigId)->delete();
            TwebPenduduk::where('config_id',  $setConfigId)->delete();
            Dtk::where('config_id',  $setConfigId)->delete();
            TwebRtm::where('config_id',  $setConfigId)->delete();
            Pelapak::where('config_id',  $setConfigId)->delete();
            Produk::where('config_id',  $setConfigId)->delete();
            ProdukKategori::where('config_id',  $setConfigId)->delete();
            ProgramPesertum::where('config_id',  $setConfigId)->delete();
            Program::where('config_id',  $setConfigId)->delete();
            LogKeluarga::where('config_id',  $setConfigId)->delete();
            LogPenduduk::where('config_id',  $setConfigId)->delete();
            LogPerubahanPenduduk::where('config_id',  $setConfigId)->delete();
            TwebDesaPamong::where('config_id',  $setConfigId)->delete();
            RefJabatan::where('config_id',  $setConfigId)->delete();
            Supleman::where('config_id',  $setConfigId)->delete();
            SuplemenTerdatum::where('config_id',  $setConfigId)->delete();
            TwebPendudukMandiri::where('config_id',  $setConfigId)->delete();
            $data = AsalKeluarga::with(['penduduk' => function ($a) {
                $a->with(['dtks', 'dtks_anggota', 'rtm', 'pelapak' => function ($b) {
                    $b->with(['produks' => function ($c) {
                        $c->with(['produk_kategori']);
                    }]);
                }, 'program_peserta'  => function ($e) {
                    $e->with(['program']);
                }, 'log_penduduk', 'log_perubahan_penduduk', 'twebdesapamong' => function ($f) {
                    $f->with(['refjabatan', 'user' => function ($i) {
                        $i->with(['user_grup', 'artikel' => function ($j) {
                            $j->with(['kategori']);
                        }]);
                    }]);
                }, 'suplemen_terdata' => function ($h) {
                    $h->with(['supleman']);
                }, 'tweb_penduduk_mandiri']);
            }, 'dtks', 'log_keluarga'])->get();

            foreach ($data as $asal) {

                $asalnya = Arr::except($asal->toArray(), ['id']);
                $asalnya['config_id'] =   $setConfigId;
                // $this->info('masukkan keluarga');
                $a = TujuanKeluarga::create($asalnya);
                foreach ($asal->dtks ?? [] as $dtks) {
                    // echo $a->id."\n";
                    $isidtks = Arr::except($dtks->toArray(), ['id']);
                    $isidtks['config_id'] =  $setConfigId;
                    $isidtks['id_keluarga'] =  $a->id;

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

                    // masukkan program_peserta
                    if ($penduduk->program_peserta) {
                        foreach ($penduduk->program_peserta as $programpeserta) {
                            // Extract fields from the associated program, excluding 'id'
                            $prog = Program::where('config_id',  $setConfigId)->where('nama', $programpeserta->program->nama)->first();
                            if ($prog == null) {
                                $isianprogram = Arr::except($programpeserta->program->toArray(), ['id']);
                                $isianprogram['config_id'] = $setConfigId;
                                $prog = Program::firstOrCreate($isianprogram);
                            }

                            // Extract fields from the program_peserta, excluding 'kartu_id_pend', 'program_id', and 'id'
                            $isianprogrampeserta = Arr::except($programpeserta->toArray(), ['kartu_id_pend', 'program_id', 'id']);
                            $isianprogrampeserta['config_id'] = $setConfigId;
                            $isianprogrampeserta['kartu_id_pend'] = $pendu->id;
                            $isianprogrampeserta['program_id'] = $prog->id;

                            // Create a new program_peserta associated with the current $pendu object
                            $pendu->program_peserta()->create($isianprogrampeserta);
                        }
                    }

                    //masukkan log_penduduk
                    if ($penduduk->log_penduduk) {
                        foreach ($penduduk->log_penduduk as $logpenduduk) {
                            $isianlogpenduduk = Arr::except($logpenduduk->toArray(), ['id', 'id_pend']);
                            $isianlogpenduduk['config_id'] = $setConfigId;
                            $isianlogpenduduk['id_pend'] = $pendu->id;

                            $logpen = $pendu->log_penduduk()->create($isianlogpenduduk);
                        }
                    }

                    //masukkan log_perubahan_penduduk
                    if ($penduduk->log_perubahan_penduduk) {
                        foreach ($penduduk->log_perubahan_penduduk as $logperubahanpenduduk) {
                            $isianlogperubahanpenduduk = Arr::except($logperubahanpenduduk->toArray(), ['id', 'id_pend']);
                            $isianlogperubahanpenduduk['config_id'] = $setConfigId;
                            $isianlogperubahanpenduduk['id_pend'] = $pendu->id;

                            $logpenper = $pendu->log_perubahan_penduduk()->create($isianlogperubahanpenduduk);
                        }
                    }

                    // masukkan tweb_desa_pamong
                    if ($penduduk->twebdesapamong) {
                        $isianrefjabatan = Arr::except($penduduk->twebdesapamong->refjabatan->toArray(), ['id']);
                        $isianrefjabatan['config_id'] = $setConfigId;
                        $jab = RefJabatan::firstOrCreate($isianrefjabatan);

                        $isiantwebdesapamong = Arr::except($penduduk->twebdesapamong->toArray(), ['id_pend', 'id', 'atasan', 'jabatan_id']);
                        $isiantwebdesapamong['config_id'] = $setConfigId;
                        $isiantwebdesapamong['id_pend'] = $pendu->id;
                        $isiantwebdesapamong['jabatan_id'] = $jab->id;
                        $pamo = $pendu->twebdesapamong()->create($isiantwebdesapamong);

                        //masukkan user dan user_grup
                        if ($penduduk->twebdesapamong->user) {
                            $isianusergrup = UserGrup::where('config_id',  $setConfigId)->where('slug', $penduduk->twebdesapamong->user->user_grup->slug)->first();
                            if ($isianusergrup == null) {
                                $isianusergrup = Arr::except($penduduk->twebdesapamong->user->user_grup->toArray(), ['id', 'slug']);
                                $isianusergrup['config_id'] = $setConfigId;
                                $isianusergrup = UserGrup::firstOrCreate($isianusergrup);
                            }

                            $isianuser = Arr::except($penduduk->twebdesapamong->user->toArray(), ['id', 'id_grup']);
                            $isianuser['config_id'] = $setConfigId;
                            $isianuser['id_grup'] = $isianusergrup->id;
                            $isianuser['pamong_id'] = $pamo->id;
                            $user = $pendu->twebdesapamong->user()->create($isianuser);

                            // masukkan artikel
                            if ($penduduk->twebdesapamong->user->artikel) {
                                foreach ($penduduk->twebdesapamong->user->artikel as $arti) {
                                    if ($arti->kategori) {
                                        $kate = Kategori::where('config_id',  $setConfigId)->where('slug', $arti->kategori->slug)->first();
                                        if ($kate == null) {
                                            $isiankategori = Arr::except($arti->kategori->toArray(), ['id', 'slug']);
                                            $isiankategori['config_id'] = $setConfigId;
                                            $kate = Kategori::firstOrCreate($isiankategori);
                                        }
                                    }

                                    $isianartikel = Arr::except($arti->toArray(), ['id', 'slug', 'id_kategori', 'id_user']);
                                    $isianartikel['config_id'] = $setConfigId;
                                    $isianartikel['id_user'] = $user->id;
                                    $isianartikel['id_kategori'] = $kate->id ?? '999';
                                    $user->artikel()->create($isianartikel);
                                }
                            }
                        }
                    }

                    // masukkan suplemen_terdata
                    if ($penduduk->suplemen_terdata) {
                        foreach ($penduduk->suplemen_terdata as $super) {
                            $isiansuplemen = Arr::except($super->supleman->toArray(), ['id']);
                            $isiansuplemen['config_id'] = $setConfigId;
                            $suplemen = Supleman::firstOrCreate($isiansuplemen);

                            $isiansuplemen_terdata = Arr::except($super->toArray(), ['id_terdata', 'id', 'id_suplemen']);
                            $isiansuplemen_terdata['config_id'] = $setConfigId;
                            $isiansuplemen_terdata['id_terdata'] = $pendu->id;
                            $isiansuplemen_terdata['id_suplemen'] = $suplemen->id;
                            $pela = $pendu->suplemen_terdata()->create($isiansuplemen_terdata);
                        }
                    }

                    //masukkan tweb_penduduk_mandiri
                    if ($penduduk->tweb_penduduk_mandiri) {
                        foreach ($penduduk->tweb_penduduk_mandiri as $twebpendudukmandiri) {
                            $isiantwebpendudukmandiri = Arr::except($twebpendudukmandiri->toArray(), ['id', 'id_pend']);
                            $isiantwebpendudukmandiri['config_id'] = $setConfigId;
                            $isiantwebpendudukmandiri['id_pend'] = $pendu->id;

                            $pendu->tweb_penduduk_mandiri()->create($isiantwebpendudukmandiri);
                        }
                    }
                }

                //masukkan log keluarga
                if ($asal->log_keluarga) {
                    foreach ($asal->log_keluarga as $logkelurga) {
                        // echo $a->id."\n";
                        $isianlogkeluarga = Arr::except($logkelurga->toArray(), ['id', 'id_kk', 'id_pend', 'id_log_penduduk']);
                        $isianlogkeluarga['config_id'] =  $setConfigId;
                        $isianlogkeluarga['id_kk'] =  $a->id;
                        $isianlogkeluarga['id_pend'] =  $pendu->id ?? null;
                        $isianlogkeluarga['id_log_penduduk'] =  $logpen->id ?? null;

                        $hasildtks = $a->log_keluarga()->create($isianlogkeluarga);
                    }
                }
            }
        });
    }
}
