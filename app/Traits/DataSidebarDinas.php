<?php

namespace App\Traits;

use Illuminate\Http\Request;

/**
 * Data untuk sidebar dinas (partials/sidebar_dinas). Dipakai semua
 * controller halaman dinas supaya sidebar-nya konsisten: menu yang aktif,
 * nama pengguna yang login, dan angka badge "Laporan Masuk".
 */
trait DataSidebarDinas
{
    /**
     * @param  string  $menuAktif  salah satu: dashboard | laporan | jadwal | petugas
     * @param  int|null  $jumlahLaporanBaru  angka badge "Laporan Masuk"; null = badge disembunyikan
     */
    protected function dataSidebarDinas(Request $request, string $menuAktif, ?int $jumlahLaporanBaru = 3): array
    {
        return [
            'menuAktif'         => $menuAktif,
            'namaPengguna'      => $request->user()->nama_lengkap,
            // Default masih angka contoh seperti tampilan awal; nanti bisa
            // diganti jumlah laporan berstatus "menunggu" dari database.
            'jumlahLaporanBaru' => $jumlahLaporanBaru,
        ];
    }

    /**
     * Data chip di topbar halaman dinas (tanggal & jumlah TPS kritis).
     * Masih data contoh seperti tampilan awal.
     */
    protected function dataTopbarDinas(): array
    {
        return [
            'tanggal'         => 'Senin, 01 Juni 2026',
            'jumlahTpsKritis' => 2,
        ];
    }
}
