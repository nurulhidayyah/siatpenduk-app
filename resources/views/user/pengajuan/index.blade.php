@extends('layouts.home')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/user">Beranda</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/user/pengajuan">Pengajuan</a>
    </li>
@endsection

@section('content')

    <section class="card-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Formulir Pengajuan Surat</h5>
                                <div class="card-body">
                                    <form method="POST" action="/user/pengajuan" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" id="created_by" name="created_by"
                                            value="{{ auth()->user()->id }}">

                                        <div class="form-group">
                                            <label for="jenis_surat">Silahkan Pilih Surat</label>
                                            <select class="form-control" name="jenis_surat" id="jenis_surat" required>
                                                <option value="">-- Jenis Surat --</option>
                                                <option value="PENGANTAR KTP">PENGANTAR KTP</option>
                                                <option value="PENGANTAR KTP SEMENTARA">PENGANTAR KTP SEMENTARA</option>
                                                <option value="PENGANTAR KETERANGAN AKTE KELAHIRAN">PENGANTAR KETERANGAN
                                                    AKTE KELAHIRAN</option>
                                                <option value="PENGANTAR KARTU KELUARGA">PENGANTAR KARTU KELUARGA</option>
                                                <option value="PENGANTAR SURAT KEMATIAN">PENGANTAR SURAT KEMATIAN</option>
                                                <option value="PENGANTAR IZIN MELAKSANAKAN KEGIATAN">PENGANTAR IZIN
                                                    MELAKSANAKAN KEGIATAN</option>
                                                <option value="PENGANTAR KETERANGAN KEHILANGAN">PENGANTAR KETERANGAN
                                                    KEHILANGAN</option>
                                                <option value="PENGANTAR KETERANGAN DOMISILI">PENGANTAR KETERANGAN DOMISILI
                                                </option>
                                                <option value="PENGANTAR KETERANGAN KURANG MAMPU">PENGANTAR KETERANGAN
                                                    KURANG MAMPU</option>
                                                <option value="PENGANTAR KETERANGAN PINDAH">PENGANTAR KETERANGAN PINDAH
                                                </option>
                                                <option value="PENGANTAR KETERANGAN USAHA">PENGANTAR KETERANGAN USAHA
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kebutuhan">Kebutuhan</label>
                                            <textarea class="form-control" id="kebutuhan" name="kebutuhan" rows="3" value="{{ old('kebutuhan') }}" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="lampiran_1">KTP (format jpg/png) - ukuran maks. 2
                                                MB</label>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('lampiran_1') is-invalid @enderror"
                                                    id="lampiran_1" name="lampiran_1">
                                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lampiran_2">Kartu Keluarga (format jpg/png) - ukuran maks. 2
                                                MB</label>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input  @error('lampiran_2') is-invalid @enderror"
                                                    id="lampiran_2" name="lampiran_2">
                                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            @endforeach


                                            <div class="alert alert-danger">{{ 'Mohon periksa ekstensi dan ukuran file' }}
                                            </div>
                                        @endif


                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-core btn-block">Buat Pengajuan
                                                    Surat</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Daftar Pengajuan Surat</h5>
                                <div class="card-body">
                                    @php
                                        $jumlahpengajuan = 0;
                                    @endphp
                                    @foreach ($pengajuans as $item)
                                        @if (auth()->user()->email)
                                            @php
                                                $jumlahpengajuan++;
                                            @endphp
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <a href="#" class="card-link text-style text-dark">
                                                        {{ $item->created_at }}
                                                        <br>
                                                        <small class="text-muted">{{ $item->jenis_surat }}</small>
                                                    </a>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="#" class="card-link text-style text-dark">
                                                        {{ $item->status }}
                                                        <br>
                                                        @if ($item->status == 'Selesai')
                                                            <a href="/exportpdf/{{ $item->id }}" target="blank"><span
                                                                    class="badge badge-info">Download Surat</span></a>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if ($jumlahpengajuan == 0)
                                        <p> Belum ada data pengajuan
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Track Record Pengajuan Surat</h5>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Silahkan pilih surat </label>
                                            <select class="form-control" id="jenissurat" name="jenissurat">
                                                <option>- Pilih data surat -</option>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($pengajuans as $item => $value)
                                                    @if (auth()->user()->email)
                                                        <option value="{{ $value->id }}">[{{ $no++ }}] -
                                                            {{ $value->jenis_surat }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </form>
                                    <div id="tracing">



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $('#jenissurat').change(function() {
            var surat = $(this).val();
            if (surat) {
                $.ajax({
                    type: "get",
                    url: '/user/tracing/' + surat + '/pengajuan-surat',


                    success: function(data) {

                        if (data) {

                            $.each(data, function(key, value) {
                                var itemJson = $.parseJSON(value['0'].history)
                                var i;
                                var bodydata = '';
                                for (i = 0; i < itemJson.length; i++) {
                                    bodydata += " <div class='row w-100' >"
                                    bodydata +=
                                        " <div class='col-auto text-center flex-column  d-sm-flex '>";
                                    bodydata += "            <div class='row h-50'>";
                                    bodydata +=
                                        "                <div class='col border-right'>&nbsp;</div>";
                                    bodydata +=
                                        "                        <div class='col'>&nbsp;</div>";
                                    bodydata += "                </div>";
                                    bodydata += "               <h5 class='m-1'>";
                                    bodydata +=
                                        "                   <span class='badge badge-pill bg-dark border'>&nbsp;</span>";
                                    bodydata += "               </h5>";
                                    bodydata += "               <div class='row h-50'>";
                                    bodydata +=
                                        "                    <div class='col border-right'>&nbsp;</div>";
                                    bodydata +=
                                        "                    <div class='col'>&nbsp;</div>";
                                    bodydata += "               </div>";
                                    bodydata += "            </div>";
                                    bodydata += " <div class='col py-2'>";
                                    bodydata += "       <div class='card  w-70'>";
                                    bodydata += "           <div class='card-body' >";
                                    bodydata +=
                                        "                  <h6 class='card-title text-muted' id='tracing_waktu'>" +
                                        itemJson[i] + " </h6>";
                                    bodydata +=
                                        "                  <p class='card-text' id='tracing_jenis'>" +
                                        itemJson[(i + 1)] + "</p>";
                                    bodydata += "           </div>";
                                    bodydata += "       </div>";
                                    bodydata += " </div>";
                                    bodydata += " </div>";


                                    i++;
                                }

                                $("#tracing").empty()
                                $("#tracing").html(bodydata);
                            });
                        }


                    }

                });
            }
        });
    </script>
@endsection
