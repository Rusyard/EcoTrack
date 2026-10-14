<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengangkutan;
use App\Traits\UnggahFotoKeCloudinary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TugasController extends Controller
{
    use UnggahFotoKeCloudinary;

    /**
     * Beranda petugas: daftar tugas pengangkutan milik petugas yang
     * sedang login (sebelumnya 2 kartu tugas di halaman ini hardcode).
     * Dipisah "Hari Ini" & "Besok" sesuai 2 tab yang sudah ada di Blade.
     * Tugas yang sudah "selesai"/"dibatalkan" tidak ditampilkan di
     * daftar supaya petugas cuma lihat tugas yang masih perlu dikerjakan.
     */
    public function beranda(Request $request): View
    {
        $petugasId = $request->user()->id;

        $tugasAktif = JadwalPengangkutan::with(['tps', 'laporan'])
            ->where('petugas_id', $petugasId)
            ->whereIn('status', ['terjadwal', 'berjalan'])
            ->orderBy('waktu')
            ->get();

        $tugasHariIni = $tugasAktif->filter(fn (JadwalPengangkutan $j) => $j->tanggal->isToday())->values();
        $tugasBesok = $tugasAktif->filter(fn (JadwalPengangkutan $j) => $j->tanggal->isTomorrow())->values();

        return view('beranda_petugas', [
            'tugasHariIni'   => $tugasHariIni,
            'tugasBesok'     => $tugasBesok,
            'jumlahSelesai'  => JadwalPengangkutan::where('petugas_id', $petugasId)->where('status', 'selesai')->count(),
            'jumlahDiproses' => JadwalPengangkutan::where('petugas_id', $petugasId)->where('status', 'berjalan')->count(),
            'jumlahTertunda' => JadwalPengangkutan::where('petugas_id', $petugasId)->where('status', 'terjadwal')->count(),
        ]);
    }

    /**
     * Detail satu tugas pengangkutan milik petugas yang sedang login
     * (sebelumnya halaman ini pakai data dummy hardcode di route).
     */
    public function show(Request $request, JadwalPengangkutan $jadwal): View
    {
        $this->pastikanMiliknya($request, $jadwal);

        $jadwal->load(['tps', 'laporan']);

        return view('detail_tugas_petugas', [
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Petugas menyelesaikan tugas: unggah foto bukti pengangkutan
     * ("sesudah") + catatan lapangan. Foto disimpan ke laporan.foto_sesudah
     * (dipasangkan dengan foto_url/"sebelum" dari masyarakat di halaman
     * detail before/after), status jadwal jadi "selesai". Laporan sendiri
     * TETAP "dijadwalkan" sampai dinas konfirmasi lewat halaman validasi
     * — supaya ada pengecekan sebelum laporan resmi ditutup.
     */
    public function selesaikan(Request $request, JadwalPengangkutan $jadwal): RedirectResponse
    {
        $this->pastikanMiliknya($request, $jadwal);

        $validated = $request->validate([
            'foto_sesudah' => ['required', 'image', 'mimes:jpeg,png,webp', 'max:5120'],
            'catatan'      => ['nullable', 'string', 'max:1000'],
        ], [
            'foto_sesudah.required' => 'Foto bukti pengangkutan wajib diunggah.',
            'foto_sesudah.image'    => 'File harus berupa gambar.',
            'foto_sesudah.mimes'    => 'Format foto harus JPG, PNG, atau WEBP.',
            'foto_sesudah.max'      => 'Ukuran foto maksimal 5MB.',
        ]);

        $fotoUrl = $this->unggahFotoKeCloudinary($request->file('foto_sesudah'), 'bukti-pengangkutan', 'foto_sesudah');

        $jadwal->update([
            'status'          => 'selesai',
            'catatan_petugas' => $validated['catatan'] ?? null,
        ]);

        if ($jadwal->laporan) {
            $jadwal->laporan->update(['foto_sesudah' => $fotoUrl]);
        }

        return redirect()
            ->route('beranda.petugas')
            ->with('success', "Tugas {$jadwal->kode_jadwal} berhasil ditandai selesai, menunggu validasi dinas.");
    }

    /**
     * Petugas B tidak boleh buka/kirim tugas milik petugas A cuma dengan
     * ganti angka id di URL.
     */
    private function pastikanMiliknya(Request $request, JadwalPengangkutan $jadwal): void
    {
        if ($jadwal->petugas_id !== $request->user()->id) {
            abort(403, 'Tugas ini bukan milik Anda.');
        }
    }
}