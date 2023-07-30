@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Validasi
@endsection

@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang {{ auth()->user()->nama }}</h1>
    <h1 class="h3 mb-4 mt-3 text-gray-800">Data Pengajuan Surat</h1>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (!$pengajuans->isEmpty())
        <div class="row">

            <?php foreach ($pengajuans as $pengajuan) : ?>
            <div class="col-md-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $pengajuan->user->nama }}</h6>
                    </div>
                    <div class="card-body">
                        <span class="text-dark">Kebutuhan :</span>
                        <p>{{ $pengajuan->kebutuhan }}</p>
                        <span class="text-dark">No Telp :</span>
                        <p>{{ $pengajuan->user->phone }}</p>
                        <span class="text-dark">Tgl Pengajuan :</span>
                        <p>{{ $pengajuan->created_at }}</p>
                    </div>
                    <div class="text-center mb-2">
                        <form action="/kades/validasi/{{ $pengajuan->id }}" method="post">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $pengajuan->id }}">
                            <input type="hidden" name="status" id="status" value="Selesai">
                            <button class="btn btn-success">Acc</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    @else
        <div class="text-center">Belum Ada Pengaduan</div>
    @endif
@endsection
