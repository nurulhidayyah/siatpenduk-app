<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Tanggapan;
use App\Models\Transworkflow;
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

            // Pengajuan::where('id', $request->pengajuan_id)->update($validatedData);
            if ($validatedData['status'] == 'Ditolak') {
                $data = Transworkflow::where('id', $request->pengajuan_id)->get();
                foreach ($data as $item)
                    $array = json_decode($item->history);

                $date = date('d/m/Y  G:i:s');
                $array[] =  "Surat di Tolak Admin";
                $array[] =  $date;
                $history = json_encode($array);
                TransWorkflow::where('id', $request->pengajuan_id)->update([
                    'wf_reference_id' => "4",
                    "history" => $history,
                ]);
                Pengajuan::where('id', $request->pengajuan_id)->update([
                    'status' => $request->status,
                ]);
            } else {
                $data = Transworkflow::where('id', $request->pengajuan_id)->get();
                foreach ($data as $item)
                    $array = json_decode($item->history);

                $date = date('d/m/Y  G:i:s');
                $array[] =  "Surat Telah diteruskan Admin";
                $array[] =  $date;
                $history = json_encode($array);
                TransWorkflow::where('id', $request->pengajuan_id)->update([
                    'wf_reference_id' => "2",
                    "history" => $history,
                ]);
                Pengajuan::where('id', $request->pengajuan_id)->update([
                    'status' => $request->status,
                ]);
            }
        }

        return redirect('/admin/pengajuan')->with('success', 'Pengajuan berhasil diproses');
    }

    public function show(Request $request)
    {

        $tanggapan = Tanggapan::where('pengajuan_id', $request->id)->first();

        if ($tanggapan !== NULL) {
            return view('user.pengajuan.show', [
                'title' => 'Detail Pengajuan',
                'tanggapan' => $tanggapan
            ]);
        } else {
            return redirect('/user/pengajuan')->with('error', 'Pengajuan sedang diproses');
        }
    }
}
