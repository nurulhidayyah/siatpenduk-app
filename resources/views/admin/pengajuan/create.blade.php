@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Pengajuan
@endsection

@section('container')
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang {{ auth()->user()->nama }}</h1>

    <h4 class="h4 mb-4 text-gray-800">Form Pengajuan Surat Keperluan</h4>

    <div class="row">
        <div class="col-lg-6">

            <form action="/dashboard/pengajuan" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="jenis_surat">Jenis Surat</label>
                    <input name="jenis_surat" id="jenis_surat"
                        class="form-control @error('jenis_surat')
                        is-invalid
                    @enderror"
                        autofocus value="{{ old('jenis_surat') }}" required>
                    @error('jenis_surat')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kebutuhan">Kebutuhan</label>
                    <input name="kebutuhan" id="kebutuhan" class="form-control @error('kebutuhan') is-invalid @enderror" value="{{ old('kebutuhan') }}" required >
                    @error('kebutuhan')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lampiran_1">Lampiran 1</label>
                    <img class="img-fluid img-preview1 mb-3 col-sm-5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('lampiran_1') is-invalid @enderror" id="lampiran_1" name="lampiran_1" required onchange="previewImage1()">
                        <label class="custom-file-label" for="lampiran_1">Foto KTP</label>
                        @error('lampiran_1')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="lampiran_2">Lampiran 2</label>
                    <img class="img-fluid img-preview2 mb-3 col-sm-5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('lampiran_1') is-invalid @enderror" id="lampiran_2" name="lampiran_2" required onchange="previewImage2()">
                        <label class="custom-file-label" for="lampiran_2">Foto Kartu Keluarga</label>
                        @error('lampiran_2')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection
