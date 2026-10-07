<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function schedule() {
        // 1. Membuat data dummy array multidimensi
    $title = 'Jadwal Bus Kampus';   
    $jadwalBus = [
        ['id' => 'B01', 'rute' => 'Gedung Rektorat - Fakultas Teknik', 'status' => 'Beroperasi'],
        ['id' => 'B02', 'rute' => 'Asrama Mahasiswa - Perpustakaan', 'status' => 'Maintenance'],
        ['id' => 'B03', 'rute' => 'Stasiun MRT - Gerbang Utama', 'status' => 'Beroperasi'],
    ];
    $content = view('schedule', compact('jadwalBus'))->render();

    // 2. Mengirim data ke View 'schedule.blade.php' menggunakan compact
    return view('layouts.master', compact('title', 'content'));
}
}
