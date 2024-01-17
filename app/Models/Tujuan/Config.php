<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Tujuan;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Config
 * 
 * @property int $id
 * @property string $app_key
 * @property string $nama_desa
 * @property string $kode_desa
 * @property int|null $kode_pos
 * @property string $nama_kecamatan
 * @property string $kode_kecamatan
 * @property string $nama_kepala_camat
 * @property string $nip_kepala_camat
 * @property string $nama_kabupaten
 * @property string $kode_kabupaten
 * @property string $nama_propinsi
 * @property string $kode_propinsi
 * @property string|null $logo
 * @property string|null $lat
 * @property string|null $lng
 * @property int|null $zoom
 * @property string|null $map_tipe
 * @property string|null $path
 * @property string|null $alamat_kantor
 * @property string|null $email_desa
 * @property string|null $telepon
 * @property string|null $nomor_operator
 * @property string|null $website
 * @property string|null $kantor_desa
 * @property string|null $warna
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Collection|Agenda[] $agendas
 * @property Collection|AnalisisIndikator[] $analisis_indikators
 * @property Collection|AnalisisKategoriIndikator[] $analisis_kategori_indikators
 * @property Collection|AnalisisKlasifikasi[] $analisis_klasifikasis
 * @property Collection|AnalisisMaster[] $analisis_masters
 * @property Collection|AnalisisParameter[] $analisis_parameters
 * @property Collection|AnalisisPeriode[] $analisis_periodes
 * @property AnalisisRespon $analisis_respon
 * @property AnalisisResponBukti $analisis_respon_bukti
 * @property Collection|AnalisisResponHasil[] $analisis_respon_hasils
 * @property Collection|AnggotaGrupKontak[] $anggota_grup_kontaks
 * @property Collection|Anjungan[] $anjungans
 * @property Collection|AnjunganMenu[] $anjungan_menus
 * @property Collection|Area[] $areas
 * @property Collection|Artikel[] $artikels
 * @property Collection|BukuKeperluan[] $buku_keperluans
 * @property Collection|BukuKepuasan[] $buku_kepuasans
 * @property Collection|BukuPertanyaan[] $buku_pertanyaans
 * @property Collection|BukuTamu[] $buku_tamus
 * @property Collection|BulananAnak[] $bulanan_anaks
 * @property Collection|Cdesa[] $cdesas
 * @property Collection|CdesaPenduduk[] $cdesa_penduduks
 * @property Collection|Covid19Pantau[] $covid19_pantaus
 * @property Collection|Covid19Pemudik[] $covid19_pemudiks
 * @property Collection|Covid19Vaksin[] $covid19_vaksins
 * @property Collection|DisposisiSuratMasuk[] $disposisi_surat_masuks
 * @property Collection|Dokuman[] $dokumen
 * @property Collection|Dtk[] $dtks
 * @property Collection|DtksAnggotum[] $dtks_anggota
 * @property Collection|DtksLampiran[] $dtks_lampirans
 * @property Collection|DtksPengaturanProgram[] $dtks_pengaturan_programs
 * @property Collection|GambarGallery[] $gambar_galleries
 * @property Collection|Gari[] $garis
 * @property Collection|GisSimbol[] $gis_simbols
 * @property Collection|GrupAkse[] $grup_akses
 * @property Collection|HubungWarga[] $hubung_wargas
 * @property Collection|IbuHamil[] $ibu_hamils
 * @property Collection|Inbox[] $inboxes
 * @property Collection|InventarisAsset[] $inventaris_assets
 * @property Collection|InventarisGedung[] $inventaris_gedungs
 * @property Collection|InventarisJalan[] $inventaris_jalans
 * @property Collection|InventarisKontruksi[] $inventaris_kontruksis
 * @property Collection|InventarisPeralatan[] $inventaris_peralatans
 * @property Collection|InventarisTanah[] $inventaris_tanahs
 * @property Collection|KaderPemberdayaanMasyarakat[] $kader_pemberdayaan_masyarakats
 * @property Collection|Kategori[] $kategoris
 * @property Collection|KehadiranAlasanKeluar[] $kehadiran_alasan_keluars
 * @property Collection|KehadiranHariLibur[] $kehadiran_hari_liburs
 * @property Collection|KehadiranJamKerja[] $kehadiran_jam_kerjas
 * @property Collection|KehadiranPengaduan[] $kehadiran_pengaduans
 * @property Collection|KehadiranPerangkatDesa[] $kehadiran_perangkat_desas
 * @property Collection|Kelompok[] $kelompoks
 * @property Collection|KelompokAnggotum[] $kelompok_anggota
 * @property Collection|KelompokMaster[] $kelompok_masters
 * @property Collection|KeuanganManualRinci[] $keuangan_manual_rincis
 * @property Collection|KeuanganMaster[] $keuangan_masters
 * @property Collection|KeuanganRefBankDesa[] $keuangan_ref_bank_desas
 * @property Collection|KeuanganRefBelOperasional[] $keuangan_ref_bel_operasionals
 * @property Collection|KeuanganRefBidang[] $keuangan_ref_bidangs
 * @property Collection|KeuanganRefBunga[] $keuangan_ref_bungas
 * @property Collection|KeuanganRefDesa[] $keuangan_ref_desas
 * @property Collection|KeuanganRefKecamatan[] $keuangan_ref_kecamatans
 * @property Collection|KeuanganRefKegiatan[] $keuangan_ref_kegiatans
 * @property Collection|KeuanganRefKorolari[] $keuangan_ref_korolaris
 * @property Collection|KeuanganRefNeracaClose[] $keuangan_ref_neraca_closes
 * @property Collection|KeuanganRefPerangkat[] $keuangan_ref_perangkats
 * @property Collection|KeuanganRefPotongan[] $keuangan_ref_potongans
 * @property Collection|KeuanganRefRek1[] $keuangan_ref_rek1s
 * @property Collection|KeuanganRefRek2[] $keuangan_ref_rek2s
 * @property Collection|KeuanganRefRek3[] $keuangan_ref_rek3s
 * @property Collection|KeuanganRefRek4[] $keuangan_ref_rek4s
 * @property Collection|KeuanganRefSbu[] $keuangan_ref_sbus
 * @property Collection|KeuanganRefSumber[] $keuangan_ref_sumbers
 * @property Collection|KeuanganTaAnggaran[] $keuangan_ta_anggarans
 * @property Collection|KeuanganTaAnggaranLog[] $keuangan_ta_anggaran_logs
 * @property Collection|KeuanganTaAnggaranRinci[] $keuangan_ta_anggaran_rincis
 * @property Collection|KeuanganTaBidang[] $keuangan_ta_bidangs
 * @property Collection|KeuanganTaDesa[] $keuangan_ta_desas
 * @property Collection|KeuanganTaJurnalUmum[] $keuangan_ta_jurnal_umums
 * @property Collection|KeuanganTaJurnalUmumRinci[] $keuangan_ta_jurnal_umum_rincis
 * @property Collection|KeuanganTaKegiatan[] $keuangan_ta_kegiatans
 * @property Collection|KeuanganTaMutasi[] $keuangan_ta_mutasis
 * @property Collection|KeuanganTaPajak[] $keuangan_ta_pajaks
 * @property Collection|KeuanganTaPajakRinci[] $keuangan_ta_pajak_rincis
 * @property Collection|KeuanganTaPemda[] $keuangan_ta_pemdas
 * @property Collection|KeuanganTaPencairan[] $keuangan_ta_pencairans
 * @property Collection|KeuanganTaPerangkat[] $keuangan_ta_perangkats
 * @property Collection|KeuanganTaRab[] $keuangan_ta_rabs
 * @property Collection|KeuanganTaRabRinci[] $keuangan_ta_rab_rincis
 * @property Collection|KeuanganTaRabSub[] $keuangan_ta_rab_subs
 * @property Collection|KeuanganTaRpjmBidang[] $keuangan_ta_rpjm_bidangs
 * @property Collection|KeuanganTaRpjmKegiatan[] $keuangan_ta_rpjm_kegiatans
 * @property Collection|KeuanganTaRpjmMisi[] $keuangan_ta_rpjm_misis
 * @property Collection|KeuanganTaRpjmPaguIndikatif[] $keuangan_ta_rpjm_pagu_indikatifs
 * @property Collection|KeuanganTaRpjmPaguTahunan[] $keuangan_ta_rpjm_pagu_tahunans
 * @property Collection|KeuanganTaRpjmSasaran[] $keuangan_ta_rpjm_sasarans
 * @property Collection|KeuanganTaRpjmTujuan[] $keuangan_ta_rpjm_tujuans
 * @property Collection|KeuanganTaRpjmVisi[] $keuangan_ta_rpjm_visis
 * @property Collection|KeuanganTaSaldoAwal[] $keuangan_ta_saldo_awals
 * @property Collection|KeuanganTaSpj[] $keuangan_ta_spjs
 * @property Collection|KeuanganTaSpjBukti[] $keuangan_ta_spj_buktis
 * @property Collection|KeuanganTaSpjRinci[] $keuangan_ta_spj_rincis
 * @property Collection|KeuanganTaSpjSisa[] $keuangan_ta_spj_sisas
 * @property Collection|KeuanganTaSpjpot[] $keuangan_ta_spjpots
 * @property Collection|KeuanganTaSpp[] $keuangan_ta_spps
 * @property Collection|KeuanganTaSppRinci[] $keuangan_ta_spp_rincis
 * @property Collection|KeuanganTaSppbukti[] $keuangan_ta_sppbuktis
 * @property Collection|KeuanganTaSpppot[] $keuangan_ta_spppots
 * @property Collection|KeuanganTaSt[] $keuangan_ta_sts
 * @property Collection|KeuanganTaStsRinci[] $keuangan_ta_sts_rincis
 * @property Collection|KeuanganTaTbp[] $keuangan_ta_tbps
 * @property Collection|KeuanganTaTbpRinci[] $keuangan_ta_tbp_rincis
 * @property Collection|KeuanganTaTriwulan[] $keuangan_ta_triwulans
 * @property Collection|KeuanganTaTriwulanRinci[] $keuangan_ta_triwulan_rincis
 * @property Collection|Kium[] $kia
 * @property Collection|KlasifikasiSurat[] $klasifikasi_surats
 * @property Collection|Komentar[] $komentars
 * @property Collection|Kontak[] $kontaks
 * @property Collection|KontakGrup[] $kontak_grups
 * @property Collection|LaporanSinkronisasi[] $laporan_sinkronisasis
 * @property Collection|Line[] $lines
 * @property Collection|LogBackup[] $log_backups
 * @property Collection|LogHapusPenduduk[] $log_hapus_penduduks
 * @property Collection|LogKeluarga[] $log_keluargas
 * @property Collection|LogPenduduk[] $log_penduduks
 * @property Collection|LogPerubahanPenduduk[] $log_perubahan_penduduks
 * @property Collection|LogRestoreDesa[] $log_restore_desas
 * @property Collection|LogSinkronisasi[] $log_sinkronisasis
 * @property Collection|LogSurat[] $log_surats
 * @property Collection|LogTolak[] $log_tolaks
 * @property Collection|LogTte[] $log_ttes
 * @property Collection|LoginAttempt[] $login_attempts
 * @property Collection|Lokasi[] $lokasis
 * @property Collection|MediaSosial[] $media_sosials
 * @property Collection|Menu[] $menus
 * @property Collection|MutasiCdesa[] $mutasi_cdesas
 * @property Collection|MutasiInventarisAsset[] $mutasi_inventaris_assets
 * @property Collection|MutasiInventarisGedung[] $mutasi_inventaris_gedungs
 * @property Collection|MutasiInventarisJalan[] $mutasi_inventaris_jalans
 * @property Collection|MutasiInventarisPeralatan[] $mutasi_inventaris_peralatans
 * @property Collection|MutasiInventarisTanah[] $mutasi_inventaris_tanahs
 * @property Collection|Notifikasi[] $notifikasis
 * @property Collection|Outbox[] $outboxes
 * @property Collection|Pelapak[] $pelapaks
 * @property Collection|Pembangunan[] $pembangunans
 * @property Collection|PembangunanRefDokumentasi[] $pembangunan_ref_dokumentasis
 * @property Collection|Pendapat[] $pendapats
 * @property Collection|Pengaduan[] $pengaduans
 * @property Collection|PermohonanSurat[] $permohonan_surats
 * @property Collection|Persil[] $persils
 * @property Collection|Pesan[] $pesans
 * @property Collection|PesanDetail[] $pesan_details
 * @property Collection|Point[] $points
 * @property Collection|Polygon[] $polygons
 * @property Collection|Posyandu[] $posyandus
 * @property Collection|Produk[] $produks
 * @property Collection|ProdukKategori[] $produk_kategoris
 * @property Collection|Program[] $programs
 * @property Collection|ProgramPesertum[] $program_peserta
 * @property Collection|RefJabatan[] $ref_jabatans
 * @property Collection|RefSyaratSurat[] $ref_syarat_surats
 * @property Collection|SasaranPaud[] $sasaran_pauds
 * @property Collection|Sentitem[] $sentitems
 * @property Collection|SettingAplikasi[] $setting_aplikasis
 * @property Collection|SettingModul[] $setting_moduls
 * @property Collection|Statistic[] $statistics
 * @property Collection|Supleman[] $suplemen
 * @property Collection|SuplemenTerdatum[] $suplemen_terdata
 * @property Collection|SuratKeluar[] $surat_keluars
 * @property Collection|SuratMasuk[] $surat_masuks
 * @property Collection|SysTraffic[] $sys_traffics
 * @property Collection|TanahDesa[] $tanah_desas
 * @property Collection|TanahKasDesa[] $tanah_kas_desas
 * @property Collection|TeksBerjalan[] $teks_berjalans
 * @property Collection|TwebDesaPamong[] $tweb_desa_pamongs
 * @property Collection|TwebKeluarga[] $tweb_keluargas
 * @property Collection|TwebPenduduk[] $tweb_penduduks
 * @property Collection|TwebPendudukMandiri[] $tweb_penduduk_mandiris
 * @property Collection|TwebPendudukUmur[] $tweb_penduduk_umurs
 * @property Collection|TwebRtm[] $tweb_rtms
 * @property Collection|TwebSuratFormat[] $tweb_surat_formats
 * @property Collection|TwebWilClusterdesa[] $tweb_wil_clusterdesas
 * @property Collection|Url[] $urls
 * @property Collection|User[] $users
 * @property Collection|UserGrup[] $user_grups
 * @property Collection|Widget[] $widgets
 *
 * @package App\Models
 */
class Config extends Model
{
	protected $table = 'config';

	protected $casts = [
		'kode_pos' => 'int',
		'zoom' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'app_key',
		'nama_desa',
		'kode_desa',
		'kode_pos',
		'nama_kecamatan',
		'kode_kecamatan',
		'nama_kepala_camat',
		'nip_kepala_camat',
		'nama_kabupaten',
		'kode_kabupaten',
		'nama_propinsi',
		'kode_propinsi',
		'logo',
		'lat',
		'lng',
		'zoom',
		'map_tipe',
		'path',
		'alamat_kantor',
		'email_desa',
		'telepon',
		'nomor_operator',
		'website',
		'kantor_desa',
		'warna',
		'created_by',
		'updated_by'
	];

	public function agendas()
	{
		return $this->hasMany(Agenda::class);
	}

	public function analisis_indikators()
	{
		return $this->hasMany(AnalisisIndikator::class);
	}

	public function analisis_kategori_indikators()
	{
		return $this->hasMany(AnalisisKategoriIndikator::class);
	}

	public function analisis_klasifikasis()
	{
		return $this->hasMany(AnalisisKlasifikasi::class);
	}

	public function analisis_masters()
	{
		return $this->hasMany(AnalisisMaster::class);
	}

	public function analisis_parameters()
	{
		return $this->hasMany(AnalisisParameter::class);
	}

	public function analisis_periodes()
	{
		return $this->hasMany(AnalisisPeriode::class);
	}

	public function analisis_respon()
	{
		return $this->hasOne(AnalisisRespon::class);
	}

	public function analisis_respon_bukti()
	{
		return $this->hasOne(AnalisisResponBukti::class);
	}

	public function analisis_respon_hasils()
	{
		return $this->hasMany(AnalisisResponHasil::class);
	}

	public function anggota_grup_kontaks()
	{
		return $this->hasMany(AnggotaGrupKontak::class);
	}

	public function anjungans()
	{
		return $this->hasMany(Anjungan::class);
	}

	public function anjungan_menus()
	{
		return $this->hasMany(AnjunganMenu::class);
	}

	public function areas()
	{
		return $this->hasMany(Area::class);
	}

	public function artikels()
	{
		return $this->hasMany(Artikel::class);
	}

	public function buku_keperluans()
	{
		return $this->hasMany(BukuKeperluan::class);
	}

	public function buku_kepuasans()
	{
		return $this->hasMany(BukuKepuasan::class);
	}

	public function buku_pertanyaans()
	{
		return $this->hasMany(BukuPertanyaan::class);
	}

	public function buku_tamus()
	{
		return $this->hasMany(BukuTamu::class);
	}

	public function bulanan_anaks()
	{
		return $this->hasMany(BulananAnak::class);
	}

	public function cdesas()
	{
		return $this->hasMany(Cdesa::class);
	}

	public function cdesa_penduduks()
	{
		return $this->hasMany(CdesaPenduduk::class);
	}

	public function covid19_pantaus()
	{
		return $this->hasMany(Covid19Pantau::class);
	}

	public function covid19_pemudiks()
	{
		return $this->hasMany(Covid19Pemudik::class);
	}

	public function covid19_vaksins()
	{
		return $this->hasMany(Covid19Vaksin::class);
	}

	public function disposisi_surat_masuks()
	{
		return $this->hasMany(DisposisiSuratMasuk::class);
	}

	public function dokumen()
	{
		return $this->hasMany(Dokuman::class);
	}

	public function dtks()
	{
		return $this->hasMany(Dtk::class);
	}

	public function dtks_anggota()
	{
		return $this->hasMany(DtksAnggotum::class);
	}

	public function dtks_lampirans()
	{
		return $this->hasMany(DtksLampiran::class);
	}

	public function dtks_pengaturan_programs()
	{
		return $this->hasMany(DtksPengaturanProgram::class);
	}

	public function gambar_galleries()
	{
		return $this->hasMany(GambarGallery::class);
	}

	public function garis()
	{
		return $this->hasMany(Gari::class);
	}

	public function gis_simbols()
	{
		return $this->hasMany(GisSimbol::class);
	}

	public function grup_akses()
	{
		return $this->hasMany(GrupAkse::class);
	}

	public function hubung_wargas()
	{
		return $this->hasMany(HubungWarga::class);
	}

	public function ibu_hamils()
	{
		return $this->hasMany(IbuHamil::class);
	}

	public function inboxes()
	{
		return $this->hasMany(Inbox::class);
	}

	public function inventaris_assets()
	{
		return $this->hasMany(InventarisAsset::class);
	}

	public function inventaris_gedungs()
	{
		return $this->hasMany(InventarisGedung::class);
	}

	public function inventaris_jalans()
	{
		return $this->hasMany(InventarisJalan::class);
	}

	public function inventaris_kontruksis()
	{
		return $this->hasMany(InventarisKontruksi::class);
	}

	public function inventaris_peralatans()
	{
		return $this->hasMany(InventarisPeralatan::class);
	}

	public function inventaris_tanahs()
	{
		return $this->hasMany(InventarisTanah::class);
	}

	public function kader_pemberdayaan_masyarakats()
	{
		return $this->hasMany(KaderPemberdayaanMasyarakat::class);
	}

	public function kategoris()
	{
		return $this->hasMany(Kategori::class);
	}

	public function kehadiran_alasan_keluars()
	{
		return $this->hasMany(KehadiranAlasanKeluar::class);
	}

	public function kehadiran_hari_liburs()
	{
		return $this->hasMany(KehadiranHariLibur::class);
	}

	public function kehadiran_jam_kerjas()
	{
		return $this->hasMany(KehadiranJamKerja::class);
	}

	public function kehadiran_pengaduans()
	{
		return $this->hasMany(KehadiranPengaduan::class);
	}

	public function kehadiran_perangkat_desas()
	{
		return $this->hasMany(KehadiranPerangkatDesa::class);
	}

	public function kelompoks()
	{
		return $this->hasMany(Kelompok::class);
	}

	public function kelompok_anggota()
	{
		return $this->hasMany(KelompokAnggotum::class);
	}

	public function kelompok_masters()
	{
		return $this->hasMany(KelompokMaster::class);
	}

	public function keuangan_manual_rincis()
	{
		return $this->hasMany(KeuanganManualRinci::class);
	}

	public function keuangan_masters()
	{
		return $this->hasMany(KeuanganMaster::class);
	}

	public function keuangan_ref_bank_desas()
	{
		return $this->hasMany(KeuanganRefBankDesa::class);
	}

	public function keuangan_ref_bel_operasionals()
	{
		return $this->hasMany(KeuanganRefBelOperasional::class);
	}

	public function keuangan_ref_bidangs()
	{
		return $this->hasMany(KeuanganRefBidang::class);
	}

	public function keuangan_ref_bungas()
	{
		return $this->hasMany(KeuanganRefBunga::class);
	}

	public function keuangan_ref_desas()
	{
		return $this->hasMany(KeuanganRefDesa::class);
	}

	public function keuangan_ref_kecamatans()
	{
		return $this->hasMany(KeuanganRefKecamatan::class);
	}

	public function keuangan_ref_kegiatans()
	{
		return $this->hasMany(KeuanganRefKegiatan::class);
	}

	public function keuangan_ref_korolaris()
	{
		return $this->hasMany(KeuanganRefKorolari::class);
	}

	public function keuangan_ref_neraca_closes()
	{
		return $this->hasMany(KeuanganRefNeracaClose::class);
	}

	public function keuangan_ref_perangkats()
	{
		return $this->hasMany(KeuanganRefPerangkat::class);
	}

	public function keuangan_ref_potongans()
	{
		return $this->hasMany(KeuanganRefPotongan::class);
	}

	public function keuangan_ref_rek1s()
	{
		return $this->hasMany(KeuanganRefRek1::class);
	}

	public function keuangan_ref_rek2s()
	{
		return $this->hasMany(KeuanganRefRek2::class);
	}

	public function keuangan_ref_rek3s()
	{
		return $this->hasMany(KeuanganRefRek3::class);
	}

	public function keuangan_ref_rek4s()
	{
		return $this->hasMany(KeuanganRefRek4::class);
	}

	public function keuangan_ref_sbus()
	{
		return $this->hasMany(KeuanganRefSbu::class);
	}

	public function keuangan_ref_sumbers()
	{
		return $this->hasMany(KeuanganRefSumber::class);
	}

	public function keuangan_ta_anggarans()
	{
		return $this->hasMany(KeuanganTaAnggaran::class);
	}

	public function keuangan_ta_anggaran_logs()
	{
		return $this->hasMany(KeuanganTaAnggaranLog::class);
	}

	public function keuangan_ta_anggaran_rincis()
	{
		return $this->hasMany(KeuanganTaAnggaranRinci::class);
	}

	public function keuangan_ta_bidangs()
	{
		return $this->hasMany(KeuanganTaBidang::class);
	}

	public function keuangan_ta_desas()
	{
		return $this->hasMany(KeuanganTaDesa::class);
	}

	public function keuangan_ta_jurnal_umums()
	{
		return $this->hasMany(KeuanganTaJurnalUmum::class);
	}

	public function keuangan_ta_jurnal_umum_rincis()
	{
		return $this->hasMany(KeuanganTaJurnalUmumRinci::class);
	}

	public function keuangan_ta_kegiatans()
	{
		return $this->hasMany(KeuanganTaKegiatan::class);
	}

	public function keuangan_ta_mutasis()
	{
		return $this->hasMany(KeuanganTaMutasi::class);
	}

	public function keuangan_ta_pajaks()
	{
		return $this->hasMany(KeuanganTaPajak::class);
	}

	public function keuangan_ta_pajak_rincis()
	{
		return $this->hasMany(KeuanganTaPajakRinci::class);
	}

	public function keuangan_ta_pemdas()
	{
		return $this->hasMany(KeuanganTaPemda::class);
	}

	public function keuangan_ta_pencairans()
	{
		return $this->hasMany(KeuanganTaPencairan::class);
	}

	public function keuangan_ta_perangkats()
	{
		return $this->hasMany(KeuanganTaPerangkat::class);
	}

	public function keuangan_ta_rabs()
	{
		return $this->hasMany(KeuanganTaRab::class);
	}

	public function keuangan_ta_rab_rincis()
	{
		return $this->hasMany(KeuanganTaRabRinci::class);
	}

	public function keuangan_ta_rab_subs()
	{
		return $this->hasMany(KeuanganTaRabSub::class);
	}

	public function keuangan_ta_rpjm_bidangs()
	{
		return $this->hasMany(KeuanganTaRpjmBidang::class);
	}

	public function keuangan_ta_rpjm_kegiatans()
	{
		return $this->hasMany(KeuanganTaRpjmKegiatan::class);
	}

	public function keuangan_ta_rpjm_misis()
	{
		return $this->hasMany(KeuanganTaRpjmMisi::class);
	}

	public function keuangan_ta_rpjm_pagu_indikatifs()
	{
		return $this->hasMany(KeuanganTaRpjmPaguIndikatif::class);
	}

	public function keuangan_ta_rpjm_pagu_tahunans()
	{
		return $this->hasMany(KeuanganTaRpjmPaguTahunan::class);
	}

	public function keuangan_ta_rpjm_sasarans()
	{
		return $this->hasMany(KeuanganTaRpjmSasaran::class);
	}

	public function keuangan_ta_rpjm_tujuans()
	{
		return $this->hasMany(KeuanganTaRpjmTujuan::class);
	}

	public function keuangan_ta_rpjm_visis()
	{
		return $this->hasMany(KeuanganTaRpjmVisi::class);
	}

	public function keuangan_ta_saldo_awals()
	{
		return $this->hasMany(KeuanganTaSaldoAwal::class);
	}

	public function keuangan_ta_spjs()
	{
		return $this->hasMany(KeuanganTaSpj::class);
	}

	public function keuangan_ta_spj_buktis()
	{
		return $this->hasMany(KeuanganTaSpjBukti::class);
	}

	public function keuangan_ta_spj_rincis()
	{
		return $this->hasMany(KeuanganTaSpjRinci::class);
	}

	public function keuangan_ta_spj_sisas()
	{
		return $this->hasMany(KeuanganTaSpjSisa::class);
	}

	public function keuangan_ta_spjpots()
	{
		return $this->hasMany(KeuanganTaSpjpot::class);
	}

	public function keuangan_ta_spps()
	{
		return $this->hasMany(KeuanganTaSpp::class);
	}

	public function keuangan_ta_spp_rincis()
	{
		return $this->hasMany(KeuanganTaSppRinci::class);
	}

	public function keuangan_ta_sppbuktis()
	{
		return $this->hasMany(KeuanganTaSppbukti::class);
	}

	public function keuangan_ta_spppots()
	{
		return $this->hasMany(KeuanganTaSpppot::class);
	}

	public function keuangan_ta_sts()
	{
		return $this->hasMany(KeuanganTaSt::class);
	}

	public function keuangan_ta_sts_rincis()
	{
		return $this->hasMany(KeuanganTaStsRinci::class);
	}

	public function keuangan_ta_tbps()
	{
		return $this->hasMany(KeuanganTaTbp::class);
	}

	public function keuangan_ta_tbp_rincis()
	{
		return $this->hasMany(KeuanganTaTbpRinci::class);
	}

	public function keuangan_ta_triwulans()
	{
		return $this->hasMany(KeuanganTaTriwulan::class);
	}

	public function keuangan_ta_triwulan_rincis()
	{
		return $this->hasMany(KeuanganTaTriwulanRinci::class);
	}

	public function kia()
	{
		return $this->hasMany(Kium::class);
	}

	public function klasifikasi_surats()
	{
		return $this->hasMany(KlasifikasiSurat::class);
	}

	public function komentars()
	{
		return $this->hasMany(Komentar::class);
	}

	public function kontaks()
	{
		return $this->hasMany(Kontak::class);
	}

	public function kontak_grups()
	{
		return $this->hasMany(KontakGrup::class);
	}

	public function laporan_sinkronisasis()
	{
		return $this->hasMany(LaporanSinkronisasi::class);
	}

	public function lines()
	{
		return $this->hasMany(Line::class);
	}

	public function log_backups()
	{
		return $this->hasMany(LogBackup::class);
	}

	public function log_hapus_penduduks()
	{
		return $this->hasMany(LogHapusPenduduk::class);
	}

	public function log_keluargas()
	{
		return $this->hasMany(LogKeluarga::class);
	}

	public function log_penduduks()
	{
		return $this->hasMany(LogPenduduk::class);
	}

	public function log_perubahan_penduduks()
	{
		return $this->hasMany(LogPerubahanPenduduk::class);
	}

	public function log_restore_desas()
	{
		return $this->hasMany(LogRestoreDesa::class);
	}

	public function log_sinkronisasis()
	{
		return $this->hasMany(LogSinkronisasi::class);
	}

	public function log_surats()
	{
		return $this->hasMany(LogSurat::class);
	}

	public function log_tolaks()
	{
		return $this->hasMany(LogTolak::class);
	}

	public function log_ttes()
	{
		return $this->hasMany(LogTte::class);
	}

	public function login_attempts()
	{
		return $this->hasMany(LoginAttempt::class);
	}

	public function lokasis()
	{
		return $this->hasMany(Lokasi::class);
	}

	public function media_sosials()
	{
		return $this->hasMany(MediaSosial::class);
	}

	public function menus()
	{
		return $this->hasMany(Menu::class);
	}

	public function mutasi_cdesas()
	{
		return $this->hasMany(MutasiCdesa::class);
	}

	public function mutasi_inventaris_assets()
	{
		return $this->hasMany(MutasiInventarisAsset::class);
	}

	public function mutasi_inventaris_gedungs()
	{
		return $this->hasMany(MutasiInventarisGedung::class);
	}

	public function mutasi_inventaris_jalans()
	{
		return $this->hasMany(MutasiInventarisJalan::class);
	}

	public function mutasi_inventaris_peralatans()
	{
		return $this->hasMany(MutasiInventarisPeralatan::class);
	}

	public function mutasi_inventaris_tanahs()
	{
		return $this->hasMany(MutasiInventarisTanah::class);
	}

	public function notifikasis()
	{
		return $this->hasMany(Notifikasi::class);
	}

	public function outboxes()
	{
		return $this->hasMany(Outbox::class);
	}

	public function pelapaks()
	{
		return $this->hasMany(Pelapak::class);
	}

	public function pembangunans()
	{
		return $this->hasMany(Pembangunan::class);
	}

	public function pembangunan_ref_dokumentasis()
	{
		return $this->hasMany(PembangunanRefDokumentasi::class);
	}

	public function pendapats()
	{
		return $this->hasMany(Pendapat::class);
	}

	public function pengaduans()
	{
		return $this->hasMany(Pengaduan::class);
	}

	public function permohonan_surats()
	{
		return $this->hasMany(PermohonanSurat::class);
	}

	public function persils()
	{
		return $this->hasMany(Persil::class);
	}

	public function pesans()
	{
		return $this->hasMany(Pesan::class);
	}

	public function pesan_details()
	{
		return $this->hasMany(PesanDetail::class);
	}

	public function points()
	{
		return $this->hasMany(Point::class);
	}

	public function polygons()
	{
		return $this->hasMany(Polygon::class);
	}

	public function posyandus()
	{
		return $this->hasMany(Posyandu::class);
	}

	public function produks()
	{
		return $this->hasMany(Produk::class);
	}

	public function produk_kategoris()
	{
		return $this->hasMany(ProdukKategori::class);
	}

	public function programs()
	{
		return $this->hasMany(Program::class);
	}

	public function program_peserta()
	{
		return $this->hasMany(ProgramPesertum::class);
	}

	public function ref_jabatans()
	{
		return $this->hasMany(RefJabatan::class);
	}

	public function ref_syarat_surats()
	{
		return $this->hasMany(RefSyaratSurat::class);
	}

	public function sasaran_pauds()
	{
		return $this->hasMany(SasaranPaud::class);
	}

	public function sentitems()
	{
		return $this->hasMany(Sentitem::class);
	}

	public function setting_aplikasis()
	{
		return $this->hasMany(SettingAplikasi::class);
	}

	public function setting_moduls()
	{
		return $this->hasMany(SettingModul::class);
	}

	public function statistics()
	{
		return $this->hasMany(Statistic::class);
	}

	public function suplemen()
	{
		return $this->hasMany(Supleman::class);
	}

	public function suplemen_terdata()
	{
		return $this->hasMany(SuplemenTerdatum::class);
	}

	public function surat_keluars()
	{
		return $this->hasMany(SuratKeluar::class);
	}

	public function surat_masuks()
	{
		return $this->hasMany(SuratMasuk::class);
	}

	public function sys_traffics()
	{
		return $this->hasMany(SysTraffic::class);
	}

	public function tanah_desas()
	{
		return $this->hasMany(TanahDesa::class);
	}

	public function tanah_kas_desas()
	{
		return $this->hasMany(TanahKasDesa::class);
	}

	public function teks_berjalans()
	{
		return $this->hasMany(TeksBerjalan::class);
	}

	public function tweb_desa_pamongs()
	{
		return $this->hasMany(TwebDesaPamong::class);
	}

	public function tweb_keluargas()
	{
		return $this->hasMany(TwebKeluarga::class);
	}

	public function tweb_penduduks()
	{
		return $this->hasMany(TwebPenduduk::class);
	}

	public function tweb_penduduk_mandiris()
	{
		return $this->hasMany(TwebPendudukMandiri::class);
	}

	public function tweb_penduduk_umurs()
	{
		return $this->hasMany(TwebPendudukUmur::class);
	}

	public function tweb_rtms()
	{
		return $this->hasMany(TwebRtm::class);
	}

	public function tweb_surat_formats()
	{
		return $this->hasMany(TwebSuratFormat::class);
	}

	public function tweb_wil_clusterdesas()
	{
		return $this->hasMany(TwebWilClusterdesa::class);
	}

	public function urls()
	{
		return $this->hasMany(Url::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public function user_grups()
	{
		return $this->hasMany(UserGrup::class);
	}

	public function widgets()
	{
		return $this->hasMany(Widget::class);
	}
}
