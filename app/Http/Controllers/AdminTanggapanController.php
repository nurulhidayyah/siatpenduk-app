<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class AdminTanggapanController extends Controller
{
    public function store(Request $request, Pengajuan $pengajuan)
    {
        $validatedData = $request->validate([
            'pengaduan_id' => 'max:255',
            'tanggapan' => 'max:255'
        ]);


        $validatedData['pengajuan_id'] = $request->pengajuan_id;

        $tanggapan = Tanggapan::create($validatedData);

        if ($tanggapan) {
            $validatedData = $request->validate([
                'status' => 'required'
            ]);

            $validatedData['status'] = $request->status;

            Pengajuan::where('id', $request->pengajuan_id)->update($validatedData);
        }

        return redirect('/admin/pengajuan')->with('success', 'Pengajuan berhasil diproses');
    }

    public function show(Request $request)
    {
        
        $tanggapan = Tanggapan::where('id', $request->id)->first();

        if ($tanggapan !== NULL) {
            return view('dashboard.pengajuan.show', [
                'title' => 'Detail Pengajuan',
                'tanggapan' => $tanggapan
            ]);
        } else {
            return redirect('/dashboard/pengajuan')->with('error', 'Pengajuan sedang diproses');
        }
    }
}
