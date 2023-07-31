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
        function getRomawi($bln)
        {
            switch ($bln) {
                case 1:
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7:
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
        }

        $bulan = $pengajuan->created_at->format('m');
        $romawi = getRomawi($bulan);

        $pdf = Pdf::loadView('pdf.surat', [
            'data' => $pengajuan,
            'bulan' => $romawi
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
