<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Transworkflow;
use Illuminate\Http\Request;

class KadesValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kades.validasi.index', [
            'pengajuans' => Pengajuan::where('status', 'Diproses')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'status' => 'required|max:255',
        ]);

        // $validatedData['status'] = $request->status;

        // Pengajuan::where('id', $request->id)->update($validatedData);
        $data = Transworkflow::where('id', $request->id)->get();
        foreach ($data as $item)
            $array = json_decode($item->history);
        $date = date('d/m/Y  G:i:s');
        $array[] =  "Surat Telah Selesai Proses";
        $array[] =  $date;


        $history = json_encode($array);
        TransWorkflow::where('id', $request->id)->update([
            'wf_reference_id' => "3",
            'history' => $history,
        ]);
        Pengajuan::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return redirect('/kades/validasi')->with('success', 'Pengajuan berhasil di acc!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
