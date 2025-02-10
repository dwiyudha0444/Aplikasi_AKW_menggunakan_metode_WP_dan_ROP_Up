@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Diskon</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Daftar Diskon</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Diskon</h5>
                    <p class="mb-40">Daftar diskon yang tersedia</p>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <a href="{{ route('create_admin_diskon') }}" class="btn btn-primary">
                                <i class="icon-plus"></i> Tambah Diskon
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                {{-- <th>ID Produk</th> --}}
                                                <th>Potongan Diskon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($diskon as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    {{-- <td>{{ $item->id_produk }}</td> --}}
                                                    <td>{{ $item->potongan_diskon }}%</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center w-100">
                                                            <div class="d-flex w-50">
                                                                <a href="{{ route('edit_admin_diskon', $item->id) }}"
                                                                    class="btn btn-warning">
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                                <form
                                                                    action="{{ route('destroy_admin_diskon', $item->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus diskon ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger ml-2">
                                                                        <i class="icon-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

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
        <!-- /Row -->

    </div>
    <!-- /Container -->
@endsection
