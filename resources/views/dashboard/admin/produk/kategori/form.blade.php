@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_kategori') }}">Daftar Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Tambah Kategori</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Form Tambah Kategori</h5>
                    <p class="mb-40">Isi data kategori baru yang akan ditambahkan</p>
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
                    <!-- Form -->
                    <form action="{{ route('store_admin_kategori') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama Kategori" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                    </form>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
@endsection
