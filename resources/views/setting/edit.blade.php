@extends('layouts.dashboard')

@section('title')
    SIATPENDUK | Edit Profile
@endsection

@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <form action="/setting/profile/{{ auth()->user()->id }}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ auth()->user()->email }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control @error('nama')
                            is-invalid
                        @enderror"
                            id="nama" name="nama" value="{{ old('nama', auth()->user()->nama) }}">
                        @error('nama')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">Picture</div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                @if (auth()->user()->image == null)
                                    <img src="/assets/img/undraw_profile.svg" class="img-thumbnail img-preview mb-3">
                                @elseif (auth()->user()->image)
                                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                        class="img-thumbnail img-preview mb-3">
                                @else
                                    <img class="img-thumbnail img-preview mb-3">
                                @endif
                                <input type="hidden" name="oldImage" id="oldImage" value="{{ auth()->user()->image }}">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input onchange="previewImage()" type="file"
                                        class="custom-file-input @error('image')
                                        is-invalid
                                    @enderror"
                                        id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
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

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
