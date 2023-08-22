@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Profile
@endsection

@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="row">
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

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->nama }}"
                        class="img-thumbnail">
                @else
                    <img src="/assets/img/undraw_profile.svg" >
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->nama }}</h5>
                    <h5 class="card-title">{{ $user->nik }}</h5>
                    <p class="card-text">{{ $user->email }}</p>
                    <p class="card-text">{{ $user->phone }}</p>
                    <p class="card-text"><small class="text-muted">Member since {{ $user->created_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
