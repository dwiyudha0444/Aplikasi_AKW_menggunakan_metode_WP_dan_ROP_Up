@extends('dashboard.admin.index')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Akun</li>
        </ol>
    </nav>

    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Daftar Akun</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Akun</h5>
                    <p class="mb-40">Daftar akun yang tersedia</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr class="{{ $user->id == auth()->id() ? 'table-info' : '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ ucfirst($user->role) }}</td>
                                                    <td>
                                                        @if ($user->id == auth()->id())
                                                            <span class="badge badge-success">Login Saat Ini</span>
                                                        @else
                                                            <span class="badge badge-secondary">Pengguna Lain</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user->id != auth()->id())
                                                            <a href="{{ route('admin_editakun', $user->id) }}"
                                                                class="mr-25" data-toggle="tooltip"
                                                                data-original-title="Ubah">
                                                                <i class="icon-pencil"></i>
                                                            </a>

                                                            <a href="javascript:void(0);" class="text-danger"
                                                                data-toggle="tooltip" data-original-title="Hapus"
                                                                onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }">
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $user->id }}"
                                                                action="{{ route('admin_deleteakun', $user->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @else
                                                            <span class="text-muted">Tidak Ada Aksi</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
