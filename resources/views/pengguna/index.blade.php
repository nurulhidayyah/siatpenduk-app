@extends('layouts.dashboard')

@section('title')
SIATPENDUK | Pengajuan
@endsection

@section('container')
<!-- Page Heading -->
<h2 class="fas fa-table">TABEL RIWAYAT SURAT</h2>
<!-- DataTales Example -->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@error('nama')
<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('phone')
<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('email')
<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('role_id')
<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>KTP</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ asset('storage/' . $user->ktp) }}" alt="" width="200" class="img-fluid"></td>
                        <td>{{ $user->user_role->role }}</td>
                        <td>{{ $user->active->active}}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#updateUser{{ $user->id }}" class="badge badge-warning">Edit</a>
                            <form action="/admin/pengguna/{{ $user->id }} " method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                <input type="hidden" name="oldImage" id="oldImage" value="{{ $user->image }}">
                                <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                        {{-- <td>
                                    <form action="/admin/tanggapan" class="d-inline">
                                        <input type="hidden" name="id" id="id" value="{{ $pengajuan->id }}">
                        <button type="submit" class="badge badge-success border-0"><i class="fas fa-eye"></i></button>
                        </form>
                        @if ($pengajuan->status == 'Diajukan')
                        <a href="/dashboard/pengajuan/{{ $pengajuan->id }}/edit" class="badge badge-warning">Edit</a>
                        <form action="/dashboard/pengajuan/{{ $pengajuan->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge badge-danger border-0" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        @elseif ($pengajuan->status == 'Selesai')
                        <a href="/exportpdf/{{ $pengajuan->id }}" class="badge badge-primary" target="blank">Cetak</a>
                        @else
                        <small>Tidak ada aksi</small>
                        @endif
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit-->
@foreach ($users as $user)
<div class="modal fade" id="updateUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserLabel">Update Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/pengguna/{{ $user->id }}" method="post">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="No Telp">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $user->ktp) }}" alt="" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select Menu</option>
                            @foreach ($user_role as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                {{ $role->role }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-activated" type="checkbox" value="2" name="is_active" id="is_active" {{ $user->is_active == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection