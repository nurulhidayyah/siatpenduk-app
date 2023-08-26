@extends('layouts.home')

@section('title')
    SIATPENDUK - Beranda
@endsection

@section('content')
    <section style="margin-top: 100px">
        <div class="container">
            <div class="row mb-2 mt-5">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Langkah Pengajuan Surat</h5>
                        <div class="card-body pb-0">
                            <div id="accordion">
                                <div class="card" style="border: none;">
                                    <h5 class="mb-0" id="pengajuanSatu">
                                        <a class="btn btn-link btn-block text-left accordion-link-custom"
                                            data-toggle="collapse" data-target="#collapsePengajuanSatu" aria-expanded="true"
                                            aria-controls="collapsePengajuanSatu">
                                            1) Langkah Pertama
                                        </a>
                                    </h5>
                                    <div id="collapsePengajuanSatu" class="collapse pt-2" aria-labelledby="pengajuanSatu"
                                        data-parent="#accordion">
                                        Pilih menu pengajuan pada navbar
                                    </div>
                                </div>
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengajuanDua">
                                        <a class="btn btn-link accordion-link-custom" data-toggle="collapse"
                                            data-target="#collapsePengajuanDua" aria-expanded="true"
                                            aria-controls="collapsePengajuanDua">
                                            2) Langkah Kedua
                                        </a>
                                    </h5>
                                    <div id="collapsePengajuanDua" class="collapse pt-2" aria-labelledby="pengajuanDua"
                                        data-parent="#accordion">
                                        Isi formulir pengajuan surat. pilih surat kemudian lampirkan file sesuai kebutuhan,
                                        kemudian klik tombol buat pengajuan surat.
                                    </div>
                                </div>
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengajuanTiga">
                                        <a class="btn btn-link accordion-link-custom" data-toggle="collapse"
                                            data-target="#collapsePengajuanTiga" aria-expanded="true"
                                            aria-controls="collapsePengajuanTiga">
                                            3) Langkah Ketiga
                                        </a>
                                    </h5>
                                    <div id="collapsePengajuanTiga" class="collapse pt-2" aria-labelledby="pengajuanTiga"
                                        data-parent="#accordion">
                                        status pengajuan surat akan muncul dibagian daftar pengajuan surat. kemudian untuk
                                        melihat proses dari pengajuan surat dapat melihat pada bagian track record pengajuan
                                        surat.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <a href="/user/pengajuan" class="btn btn-core btn-block">Lakukan Pengajuan
                                Surat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @if ($message = Session::get('success'))
        <script>
            swal("{{ $message }}", " ", "success");
        </script>
    @elseif($message = Session::get('duplicate'))
        <script>
            swal("{{ $message }}", " ", "error");
        </script>
    @endif
@endsection
