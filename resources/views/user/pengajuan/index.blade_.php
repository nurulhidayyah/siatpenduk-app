@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Pengajuan
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL SURAT KEPERLUAN</h2>
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
                            <th>NO</th>
                            <th>Jenis Surat</th>
                            <th>Kebutuhan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $pengajuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengajuan->jenis_surat }}</td>
                                <td>{{ $pengajuan->kebutuhan }}</td>
                                <td>{{ $pengajuan->created_at }}</td>
                                <td>{{ $pengajuan->status }}</td>
                                <td>
                                    <form action="/admin/tanggapan" class="d-inline">
                                        <input type="hidden" name="id" id="id" value="{{ $pengajuan->id }}">
                                        <button type="submit" class="badge badge-success border-0"><i
                                                class="fas fa-eye"></i></button>
                                    </form>
                                    @if ($pengajuan->status == 'Diajukan')
                                        <a href="/dashboard/pengajuan/{{ $pengajuan->id }}/edit"
                                            class="badge badge-warning">Edit</a>
                                        <form action="/dashboard/pengajuan/{{ $pengajuan->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge badge-danger border-0"
                                                onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    @elseif ($pengajuan->status == 'Selesai')
                                        <a href="/exportpdf/{{ $pengajuan->id }}" class="badge badge-primary"
                                            target="blank">Cetak</a>
                                    @else
                                        <small>Tidak ada aksi</small>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a class="btn btn-info" href="/dashboard/pengajuan/create" role="button">TAMBAH SURAT KEPERLUAN</a>
@endsection
