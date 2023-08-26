@extends('layouts.auth')
@section('title')
    <title>SIATPENDUK - REGISTER</title>
@endsection
@section('nav')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light py-4">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/assets/img/logoDesaDukuh.png" width="30" height="30" class="d-inline-block align-top"
                    alt="SIATPENDUK">
                SIATPENDUK
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <span class="nav-link nav-link-register">
                        <a href="/login"> Login</a>
                    </span>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of Navbar -->
@endsection
@section('content')
    <section class="my-register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register <span class="text-core">SIATPENDUK</span></h4>

                            <form method="POST" enctype="multipart/form-data" action="/register"
                                class="my-login-validation">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik"
                                            placeholder="NIK" value="{{ old('nik') }}" required maxlength="16"
                                            onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                        @error('nik')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                            placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                                        @error('tempat_lahir')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" onfocus="(this.type='date')" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" required>
                                        @error('tanggal_lahir')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}" required>
                                        @error('pekerjaan')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                                        @error('alamat')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control @error('agama') is-invalid @enderror" name="agama" required>
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                            <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                            <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        </select>
                                        @error('agama')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="No Telepon" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                                        @error('password')
                                            <small class="text-danger pl-3">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder=" ketik ulang password">
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-core btn-block">REGISTER AKUN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2023 &mdash; SIATPENDUK
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
