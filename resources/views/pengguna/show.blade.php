@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Detail Pengajuan
@endsection

@section('container')
    <!-- Page Heading -->
    <a href="/dashboard/pengajuan" class="btn btn-dark mb-3"><i class="fas fa-arrow-left"></i></a>
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="row">
        <div class="card mb-3 col-lg-8">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Jenis Surat : <span class="text-dark">{{ $tanggapan->pengajuan->jenis_surat }}</span>
                        </h5>

                        <p class="card-text"> Status :
                            @if ($tanggapan->pengajuan->status == 'Diajukan')
                                {!! '<span class="badge badge-secondary">Sedang di verifikasi</span>' !!}
                            @elseif ($tanggapan->pengajuan->status == 'Diproses')
                                {!! '<span class="badge badge-primary">Sedang di proses</span>' !!}
                            @elseif ($tanggapan->pengajuan->status == 'Selesai')
                                {!! '<span class="badge badge-success">Selesai dikerjakan</span>' !!}
                            @elseif ($tanggapan->pengajuan->status == 'Ditolak')
                                {!! '<span class="badge badge-danger">Pengaduan ditolak</span>' !!}
                            @else
                                {!! '-' !!}
                            @endif
                        </p>
                        
                        <p class="card-text">Tanggapan : <span class="text-success">{{ $tanggapan->tanggapan }}</span>
                        </p>

                        <p class="card-text">Tanggal Pengajuan : <span
                                class="text-danger">{{ $tanggapan->pengajuan->created_at }}</span>
                        </p>
                        <p class="card-text">
                            Tanggal Tanggapan :
                            <span class="text-danger">
                                {{ $tanggapan->created_at }}
                            </span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
