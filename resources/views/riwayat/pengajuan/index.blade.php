@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Pengajuan
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL RIWAYAT SURAT</h2>
    <!-- DataTales Example -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Jenis Surat</th>
                            <th>Kebutuhan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanggapans as $tanggapan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tanggapan->pengajuan->user->nama }}</td>
                                <td>{{ $tanggapan->pengajuan->user->phone }}</td>
                                <td>{{ $tanggapan->pengajuan->jenis_surat }}</td>
                                <td>{{ $tanggapan->pengajuan->kebutuhan }}</td>
                                <td>{{ $tanggapan->pengajuan->created_at->format('d-m-Y') }}</td>
                                <td>{{ $tanggapan->created_at->format('d-m-Y') }}</td>
                                <td>{{ $tanggapan->created_at->format('Y') }}</td>
                                <td>{{ $tanggapan->pengajuan->status }}</td>
                                <td>
                                    <a href="/exportpdf/{{ $tanggapan->pengajuan->id }}" class="badge badge-primary" target="blank">Cetak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
