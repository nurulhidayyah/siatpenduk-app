<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.index', [
            'users' => User::where('role_id', '!=', 1)->get(),
            'user_role' => UserRole::all()
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'phone' => ['required', 'max:255'],
            'email' => 'required|email',
            'role_id' => 'required',
        ]);

        $validatedData['is_active'] = $request->is_active;

        User::where('id', $request->id)->update($validatedData);

        return redirect('/admin/pengguna')->with('success', 'Pengguna berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $pengajuan = Pengajuan::where('user_id', $request->id)->get();
        $user = User::where('id', $request->id)->first();

        foreach ($pengajuan as $item) {
            // Menghapus file terkait dari penyimpanan
            if ($item->lampiran_1 && $item->lampiran_2) {
                Storage::delete($item->lampiran_1);
                Storage::delete($item->lampiran_2);
            }

            // Menghapus data pengajuan
            $item->delete();
            DB::table('tanggapans')->where('pengajuan_id', $item->id)->delete();
            DB::table('transworkflows')->where('pengajuan_id', $item->id)->delete();
        }

        Storage::delete($user->image);
        // Menghapus data pengguna
        User::destroy($request->id);

        return redirect('/admin/pengguna')->with('success', 'Pengguna berhasil dihapus!');
    }
}
