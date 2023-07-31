<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.pengajuan.index', [
            'pengajuans' => Pengajuan::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_surat' => 'required|max:255',
            'kebutuhan' => ['required', 'max:255'],
            'lampiran_1' => 'required|image|file|max:1024|mimes:png,jpg,jpeg',
            'lampiran_2' => 'required|image|file|max:1024|mimes:png,jpg,jpeg',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['lampiran_1'] = $request->file('lampiran_1')->store('pengajuan-lampiran');
        $validatedData['lampiran_2'] = $request->file('lampiran_2')->store('pengajuan-lampiran');

        Pengajuan::create($validatedData);

        return redirect('/dashboard/pengajuan')->with('success', 'Pengajuan berhasil dikirm! Silahkan menunggu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        return view('dashboard.pengajuan.show', [
            'title' => 'Detail Pengajuan',
            'pengajuan' => $pengajuan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('dashboard.pengajuan.edit', [
            'title' => 'Edit Pengajuan',
            'pengajuan' => $pengajuan
        ]);
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
        $validatedData = $request->validate([
            'jenis_surat' => 'required|max:255',
            'kebutuhan' => ['required', 'max:255'],
            'lampiran_1' => 'image|file|max:1024|mimes:png,jpg,jpeg',
            'lampiran_2' => 'image|file|max:1024|mimes:png,jpg,jpeg',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        if ($request->file('lampiran_1')) {
            if ($request->oldImage1) {
                Storage::delete($request->oldImage1);
            }
            $validatedData['lampiran_1'] = $request->file('lampiran_1')->store('pengajuan-lampiran');
        }

        if ($request->file('lampiran_2')) {
            if ($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }
            $validatedData['lampiran_2'] = $request->file('lampiran_2')->store('pengajuan-lampiran');
        }

        Pengajuan::where('id', $pengajuan->id)->update($validatedData);

        return redirect('/dashboard/pengajuan')->with('success', 'Pengajuan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        Storage::delete($pengajuan->lampiran_1);
        Storage::delete($pengajuan->lampiran_2);
        Pengajuan::destroy($pengajuan->id);

        return redirect('/dashboard/pengajuan')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
