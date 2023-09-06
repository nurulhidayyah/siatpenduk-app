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
                        <td align="center">
                            @if ($tanggapan->pengajuan->status == 'Selesai')
                            <a href="/exportpdf/{{ $tanggapan->pengajuan->id }}" class="badge badge-primary" target="blank">Cetak</a>
                            <a href="#" data-toggle="modal" data-target="#upload{{ $tanggapan->pengajuan->id }}" class="badge badge-warning">Upload</a>
                            @else
                            <p>Tidak ada aksi</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($tanggapans as $tanggapan)
<div class="modal fade" id="upload{{ $tanggapan->pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadLabel">Upload Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/upload/{{ $tanggapan->pengajuan->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="pengajuan_id" value="{{ $tanggapan->pengajuan->id }}">
                        <label for="surat">Upload Surat</label>
                        <img class="img-fluid img-preview1 mb-3 col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('surat') is-invalid @enderror" id="surat" name="surat" onchange="previewImage1()">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection