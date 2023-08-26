@extends('layouts.home')

@section('title')
    SIATPENDUK - Profile
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Profile Saya</h5>
                                <div class="row mt-3 pl-3 mb-2">
                                    <div class="col-md-4">
                                        @if ($user->image)
                                            <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->nama }}"
                                                class="img-fluid">
                                        @else
                                            <img src="/assets/img/undraw_profile.svg">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $user->nama }}</h5>
                                            <h5 class="card-title">{{ $user->nik }}</h5>
                                            <p class="card-text">{{ $user->email }}</p>
                                            <p class="card-text">{{ $user->phone }}</p>
                                            <p class="card-text"><small class="text-muted">Member since {{ $user->created_at }}</small></p>
                                            <a href="/user/profile/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                                        </div>
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
