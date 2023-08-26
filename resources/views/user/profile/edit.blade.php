@extends('layouts.home')

@section('title')
    SIATPENDUK - Edit
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Edit Profile Saya</h5>
                                <div class="card-body">
                                    <form method="post" action="/user/profile/{{ auth()->user()->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nik">NIK</label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                    id="nik" placeholder="NIK"
                                                    value="{{ old('nik', auth()->user()->nik) }}" required maxlength="16"
                                                    onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                                @error('nik')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    placeholder="Nama" value="{{ old('nama', auth()->user()->nama) }}" required>
                                                @error('nama')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                                                    value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}"
                                                    required>
                                                @error('tempat_lahir')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="text" id="tanggal_lahir" onfocus="(this.type='date')"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    name="tanggal_lahir" placeholder="Tanggal Lahir"
                                                    value="{{ old('tanggal_lahir', date('d-m-Y', auth()->user()->tanggal_lahir)) }}"
                                                    required>
                                                @error('tanggal_lahir')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    name="jenis_kelamin" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-laki"
                                                        {{ auth()->user()->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ auth()->user()->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" id="pekerjaan"
                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                    name="pekerjaan" placeholder="Pekerjaan"
                                                    value="{{ old('pekerjaan', auth()->user()->pekerjaan) }}" required>
                                                @error('pekerjaan')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" id="alamat"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    name="alamat" placeholder="Alamat"
                                                    value="{{ old('alamat', auth()->user()->alamat) }}" required>
                                                @error('alamat')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="agama">Agama</label>
                                                <select class="form-control @error('agama') is-invalid @enderror"
                                                    name="agama" required>
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="Islam"
                                                        {{ auth()->user()->agama == 'Islam' ? 'selected' : '' }}>
                                                        Islam</option>
                                                    <option value="Protestan"
                                                        {{ auth()->user()->agama == 'Protestan' ? 'selected' : '' }}>
                                                        Protestan
                                                    </option>
                                                    <option value="Katholik"
                                                        {{ auth()->user()->agama == 'Katholik' ? 'selected' : '' }}>
                                                        Katholik
                                                    </option>
                                                    <option value="Budha"
                                                        {{ auth()->user()->agama == 'Budha' ? 'selected' : '' }}>
                                                        Budha</option>
                                                    <option value="Hindu"
                                                        {{ auth()->user()->agama == 'Hindu' ? 'selected' : '' }}>
                                                        Hindu</option>
                                                </select>
                                                @error('agama')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    placeholder="Email" value="{{ auth()->user()->email }}" required readonly>
                                                @error('email')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone">No Telepon</label>
                                                <input type="text" id="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    name="phone" placeholder="No Telepon"
                                                    value="{{ old('phone', auth()->user()->phone) }}" required>
                                                @error('phone')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-8">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        @if (auth()->user()->image == null)
                                                            <img src="/assets/img/undraw_profile.svg"
                                                                class="img-thumbnail img-preview mb-3">
                                                        @elseif (auth()->user()->image)
                                                            <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                                                class="img-thumbnail img-preview mb-3">
                                                        @else
                                                            <img class="img-thumbnail img-preview mb-3">
                                                        @endif
                                                        <input type="hidden" name="oldImage" id="oldImage"
                                                            value="{{ auth()->user()->image }}">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input onchange="previewImage()" type="file"
                                                                class="custom-file-input @error('image')
                                                                    is-invalid
                                                                @enderror"
                                                                id="image" name="image">
                                                            <label class="custom-file-label" for="image">Choose
                                                                file</label>
                                                            @error('image')
                                                                <small class="text-danger pl-3">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-core btn-block">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
