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
                <div class="col-md-6">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Register <span class="text-core">SIATPENDUK</span></h4>

                                <form method="POST" enctype="multipart/form-data" action="/register"
                                    class="my-login-validation">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" placeholder="Nama" placeholder="Nama Lengkap"
                                                value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" placeholder="Email" placeholder="Email"
                                                value="{{ old('email') }}" required>
                                            @error('email')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" placeholder="No Telp" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="password" required>
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
        </div>
    </section>
@endsection
@section('script')
@endsection
