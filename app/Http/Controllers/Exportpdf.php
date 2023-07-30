<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class Exportpdf extends Controller
{
    public function index(Pengajuan $pengajuan)
    {
        $data = $pengajuan;
        $pdf = Pdf::loadView('pdf.surat')->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
