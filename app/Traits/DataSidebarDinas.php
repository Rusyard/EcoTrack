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
     */
    protected function dataSidebarDinas(Request $request, string $menuAktif): array
    {
        return [
            'menuAktif'         => $menuAktif,
            'namaPengguna'      => $request->user()->nama_lengkap,
            // Masih angka contoh seperti tampilan awal; nanti bisa diganti
            // jumlah laporan berstatus "menunggu" dari database.
            'jumlahLaporanBaru' => 3,
        ];
    }
}
