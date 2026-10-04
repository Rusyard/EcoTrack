<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Tps;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LaporanController extends Controller
{
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
            'laporanSaya'     => $laporanSaya,
            'totalLaporan'    => $laporanSaya->count(),
            'sedangDiproses'  => $laporanSaya->where('status', 'dijadwalkan')->count(),
            'selesaiDiangkut' => $laporanSaya->where('status', 'selesai')->count(),
        ]);
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
            ? $this->unggahFotoKeCloudinary($request->file('foto'))
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
     * Upload foto ke Cloudinary lewat signed upload (API secret dipakai
     * di server, tidak pernah dikirim ke browser), lalu kembalikan URL
     * publiknya buat disimpan di kolom foto_url.
     */
    private function unggahFotoKeCloudinary(UploadedFile $file): string
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');

        if (! $cloudName || ! $apiKey || ! $apiSecret) {
            throw ValidationException::withMessages([
                'foto' => 'Upload foto belum dikonfigurasi di server (CLOUDINARY_* belum diisi di .env).',
            ]);
        }

        $timestamp = time();
        $folder = 'laporan';

        // Signature Cloudinary: semua parameter SELAIN file, api_key, dan
        // signature, diurutkan alfabetis sebagai key=value&key=value,
        // ditempel api_secret di akhir, lalu di-SHA1.
        $stringUntukDitandatangani = "folder={$folder}&timestamp={$timestamp}{$apiSecret}";
        $signature = sha1($stringUntukDitandatangani);

        $response = Http::attach('file', fopen($file->getRealPath(), 'r'), $file->getClientOriginalName())
            ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                'api_key'   => $apiKey,
                'timestamp' => $timestamp,
                'folder'    => $folder,
                'signature' => $signature,
            ]);

        if ($response->failed()) {
            report(new \RuntimeException('Upload Cloudinary gagal: '.$response->body()));

            throw ValidationException::withMessages([
                'foto' => 'Gagal mengunggah foto, silakan coba lagi.',
            ]);
        }

        return $response->json('secure_url');
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
            'laporan' => $laporan,
        ]);
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
}