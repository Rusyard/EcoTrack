<?php

namespace App\Http\Controllers;
use App\Models\Shuttle;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Ekspor seluruh data ke PDF
     */
    public function exportPdf()
    {
        $data = Shuttle::all();
        $pdf = Pdf::loadView('laporan.view_pdf', ['data' => $data]);
        return $pdf->download('laporan-pjbl.pdf');
    }
}