<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengangkutan;
use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Tps;
use App\Models\User;
use App\Traits\UnggahFotoKeCloudinary;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LaporanController extends Controller
{
    use UnggahFotoKeCloudinary;

    /**
     * Beranda masyarakat: ringkasan jumlah laporan (total/proses/selesai)
     * dan histori laporan milik user yang sedang login saja (bukan
     * laporan semua orang), sebelumnya halaman ini statis/hardcode.
     */
    public function beranda(Request $request): View
    {
        $laporanSaya = Laporan::with('tps')
            ->where('pelapor_id', $request->user()->id)
            ->latest('tanggal_lapor')
            ->get();

        return view('beranda_masyarakat', [
            'judul'           => 'EcoTrack - Dashboard',
            'laporanSaya'     => $laporanSaya,
            'totalLaporan'    => $laporanSaya->count(),
            'sedangDiproses'  => $laporanSaya->where('status', 'dijadwalkan')->count(),
            'selesaiDiangkut' => $laporanSaya->where('status', 'selesai')->count(),
            // Kelas CSS + label status laporan untuk tabel histori
            // (sebelumnya dipetakan langsung di Blade lewat @php).
            'daftarStatus'    => [
                'menunggu'    => ['kelas' => 'status-menunggu', 'label' => 'Menunggu Validasi'],
                'dijadwalkan' => ['kelas' => 'status-proses',   'label' => 'Proses Pengangkutan'],
                'selesai'     => ['kelas' => 'status-selesai',  'label' => 'Selesai'],
            ],
        ] + $this->dataPengguna($request));
    }

    /**
     * Data pengguna yang sedang login untuk navbar & sapaan di halaman
     * masyarakat (sebelumnya dipanggil langsung lewat Auth::user() di Blade).
     */
    private function dataPengguna(Request $request): array
    {
        $nama = $request->user()->nama_lengkap;

        return [
            'namaLengkap' => $nama,
            'namaDepan'   => explode(' ', $nama)[0],
            'inisial'     => strtoupper(substr($nama, 0, 1)),
        ];
    }

    /**
     * Tampilkan form pelaporan untuk masyarakat. Daftar TPS diambil dari
     * database supaya pilihan lokasi selalu sinkron dengan tabel tps
     * (sebelumnya 6 lokasi ini ditulis manual/hardcode di Blade).
     */
    public function create(): View
    {
        return view('form_laporan', [
            'daftarTps' => Tps::orderBy('nama_tps')->get(),
        ]);
    }

    /**
     * Simpan laporan baru dari masyarakat, termasuk foto kondisi TPS
     * (kalau diunggah), supaya muncul di halaman "Laporan Masuk" dinas.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'lokasi'    => ['bail', 'required', 'string', 'exists:tps,nama_tps'],
            'deskripsi' => ['bail', 'required', 'string', 'min:20', 'max:1000'],
            // Foto sengaja tidak diwajibkan (form aslinya juga tidak
            // mewajibkan), tapi kalau ada, harus foto asli & maks 5MB.
            'foto'      => ['bail', 'nullable', 'image', 'mimes:jpeg,png,webp', 'max:5120'],
        ], [
            'lokasi.required'    => 'Silakan pilih lokasi TPS.',
            'lokasi.exists'      => 'Lokasi TPS tidak valid.',

            'deskripsi.required' => 'Deskripsi kondisi TPS wajib diisi.',
            'deskripsi.min'      => 'Deskripsi minimal 20 karakter.',
            'deskripsi.max'      => 'Deskripsi maksimal 1000 karakter.',

            'foto.image'         => 'File harus berupa gambar.',
            'foto.mimes'         => 'Format foto harus JPG, PNG, atau WEBP.',
            'foto.max'           => 'Ukuran foto maksimal 5MB.',
        ]);

        $tps = Tps::where('nama_tps', $validated['lokasi'])->firstOrFail();

        // Foto diunggah ke Cloudinary (bukan disk lokal), supaya semua
        // anggota tim & siapa pun yang buka halaman dinas bisa lihat foto
        // yang sama, bukan cuma foto yang ada di laptop pengunggah.
        $fotoUrl = $request->hasFile('foto')
            ? $this->unggahFotoKeCloudinary($request->file('foto'), 'laporan', 'foto')
            : null;

        // kode_laporan di-generate di sini (bukan diisi user), jadi dicoba
        // beberapa kali kalau kebetulan bentrok dengan laporan lain yang
        // tersimpan di saat yang hampir bersamaan.
        for ($percobaan = 1; $percobaan <= 3; $percobaan++) {
            try {
                Laporan::create([
                    'kode_laporan'  => $this->kodeLaporanBerikutnya(),
                    'tps_id'        => $tps->id,
                    'pelapor_id'    => $request->user()->id,
                    'tanggal_lapor' => now(),
                    'deskripsi'     => $validated['deskripsi'],
                    'foto_url'      => $fotoUrl,
                    'prioritas'     => 'normal',
                    'status'        => 'menunggu',
                ]);
                break;
            } catch (UniqueConstraintViolationException $e) {
                if ($percobaan === 3) {
                    throw $e;
                }
            }
        }

        return redirect()
            ->route('form.laporan')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih sudah membantu menjaga kebersihan kota.');
    }

    /**
     * Halaman "Laporan Masuk" dinas: daftar semua laporan masyarakat
     * beserta foto yang diunggah (sebelumnya tabel ini statis/hardcode).
     */
    public function index(): View
    {
        $laporan = Laporan::with(['tps', 'pelapor'])
            ->latest('tanggal_lapor')
            ->get();

        return view('laporan_masuk_dinas', [
            'laporan'       => $laporan,
            // Dipakai buat dropdown "Petugas yang Ditugaskan" di modal
            // Jadwalkan. Petugas yang cuti/nonaktif sengaja tidak
            // ditampilkan supaya dinas tidak salah menugaskan orang yang
            // sedang tidak bisa bertugas.
            'daftarPetugas' => User::where('role', 'petugas')
                ->whereIn('status', ['aktif', 'bertugas'])
                ->orderBy('nama_lengkap')
                ->get(),
        ]);
    }

    /**
     * Dinas menjadwalkan laporan "menunggu" ke petugas tertentu (modal
     * "Buat Instruksi Jadwal Pengangkutan"). Bikin record jadwal_pengangkutan
     * baru, ubah status laporan jadi "dijadwalkan" — begitu disimpan,
     * tugas ini otomatis nongol di beranda petugas yang ditugaskan
     * (lihat TugasController::beranda).
     */
    public function jadwalkan(Request $request, Laporan $laporan): RedirectResponse
    {
        if ($laporan->status !== 'menunggu') {
            throw ValidationException::withMessages([
                'petugas_id' => 'Laporan ini sudah dijadwalkan/ditangani sebelumnya.',
            ]);
        }

        $validated = $request->validate([
            'petugas_id' => ['bail', 'required', 'integer', 'exists:users,id'],
            'tanggal'    => ['bail', 'required', 'date', 'after_or_equal:today'],
            'waktu'      => ['bail', 'required', 'date_format:H:i'],
            'catatan'    => ['nullable', 'string', 'max:1000'],
        ], [
            'petugas_id.required' => 'Petugas yang ditugaskan wajib dipilih.',
            'petugas_id.exists'   => 'Petugas tidak ditemukan.',
            'tanggal.required'    => 'Tanggal pengangkutan wajib diisi.',
            'tanggal.after_or_equal' => 'Tanggal pengangkutan tidak boleh di masa lalu.',
            'waktu.required'      => 'Jam pengangkutan wajib diisi.',
            'waktu.date_format'   => 'Format jam tidak valid.',
        ]);

        // Dipastikan yang dipilih beneran petugas (bukan masyarakat/dinas
        // yang id-nya ditebak lewat request manual).
        $petugas = User::where('id', $validated['petugas_id'])->where('role', 'petugas')->first();
        if (! $petugas) {
            throw ValidationException::withMessages([
                'petugas_id' => 'Petugas tidak valid.',
            ]);
        }

        // Kendaraan dipilih otomatis (yang pertama "tersedia") karena
        // modal ini sengaja tidak menampilkan pilihan kendaraan ke dinas —
        // biar alurnya sesimpel mockup-nya. Kalau tidak ada yang kosong,
        // dinas diminta tunggu ada kendaraan yang available dulu.
        $kendaraan = Kendaraan::where('status', 'tersedia')->first();
        if (! $kendaraan) {
            throw ValidationException::withMessages([
                'petugas_id' => 'Semua kendaraan sedang digunakan/perbaikan, belum bisa menjadwalkan dulu.',
            ]);
        }

        for ($percobaan = 1; $percobaan <= 3; $percobaan++) {
            try {
                JadwalPengangkutan::create([
                    'kode_jadwal'  => $this->kodeJadwalBerikutnya(),
                    'laporan_id'   => $laporan->id,
                    'tps_id'       => $laporan->tps_id,
                    'petugas_id'   => $petugas->id,
                    'kendaraan_id' => $kendaraan->id,
                    'tanggal'      => $validated['tanggal'],
                    'waktu'        => $validated['waktu'],
                    'status'       => 'terjadwal',
                    'catatan'      => $validated['catatan'] ?? null,
                ]);
                break;
            } catch (UniqueConstraintViolationException $e) {
                if ($percobaan === 3) {
                    throw $e;
                }
            }
        }

        $kendaraan->update(['status' => 'digunakan']);
        $laporan->update(['status' => 'dijadwalkan']);

        return redirect()
            ->route('laporan.masuk.dinas')
            ->with('success', "Laporan {$laporan->kode_laporan} berhasil dijadwalkan ke {$petugas->nama_lengkap}.");
    }

    /**
     * Halaman detail before/after buat masyarakat (dibuka dari tombol
     * "Detail" di histori laporannya sendiri). Foto "sebelum" dari
     * foto_url (diunggah masyarakat), foto "sesudah" dari foto_sesudah
     * (diunggah petugas lewat form Update Status) kalau sudah ada.
     */
    public function detailSaya(Request $request, Laporan $laporan): View
    {
        // Jangan sampai masyarakat A bisa lihat detail laporan masyarakat B
        // cuma dengan ganti angka di URL.
        if ($laporan->pelapor_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }

        $laporan->load(['tps', 'jadwalPengangkutan.petugas']);

        return view('detail_laporan_masyarakat', [
            'laporan' => $laporan,
        ]);
    }

    /**
     * Halaman validasi dinas: before/after yang sama seperti punya
     * masyarakat, ditambah tombol "Konfirmasi & Tutup Laporan" yang
     * mengubah status laporan jadi selesai.
     */
    public function tampilkanValidasi(Laporan $laporan): View
    {
        $laporan->load(['tps', 'pelapor', 'jadwalPengangkutan.petugas']);

        return view('validasi_laporan_dinas', [
            'laporan' => $laporan,
        ]);
    }

    /**
     * Konfirmasi dinas bahwa laporan beneran sudah ditangani, baru
     * statusnya resmi jadi "selesai" (sebelum ini, walau petugas sudah
     * kirim foto sesudah, laporan masih berstatus "dijadwalkan" sampai
     * divalidasi dinas).
     */
    public function validasi(Laporan $laporan): RedirectResponse
    {
        $laporan->update(['status' => 'selesai']);

        return redirect()
            ->route('laporan.masuk.dinas')
            ->with('success', "Laporan {$laporan->kode_laporan} berhasil ditutup.");
    }

    /**
     * Kode berikutnya dengan pola RPT001, RPT002, dst, mengikuti pola
     * yang sudah dipakai LaporanSeeder.
     */
    private function kodeLaporanBerikutnya(): string
    {
        $terakhir = Laporan::where('kode_laporan', 'like', 'RPT%')
            ->orderByRaw('CAST(SUBSTRING(kode_laporan, 4) AS UNSIGNED) DESC')
            ->value('kode_laporan');

        $nomorBerikutnya = $terakhir ? ((int) substr($terakhir, 3)) + 1 : 1;

        return 'RPT'.str_pad((string) $nomorBerikutnya, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Kode berikutnya dengan pola JDW001, JDW002, dst, mengikuti pola
     * yang sudah dipakai JadwalPengangkutanSeeder.
     */
    private function kodeJadwalBerikutnya(): string
    {
        $terakhir = JadwalPengangkutan::where('kode_jadwal', 'like', 'JDW%')
            ->orderByRaw('CAST(SUBSTRING(kode_jadwal, 4) AS UNSIGNED) DESC')
            ->value('kode_jadwal');

        $nomorBerikutnya = $terakhir ? ((int) substr($terakhir, 3)) + 1 : 1;

        return 'JDW'.str_pad((string) $nomorBerikutnya, 3, '0', STR_PAD_LEFT);
    }
}