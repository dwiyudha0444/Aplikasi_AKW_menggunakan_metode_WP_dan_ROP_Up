@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_produk') }}">Daftar Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Tambah Produk</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Form Tambah Produk</h5>
                    <p class="mb-40">Isi data produk baru yang akan ditambahkan</p>

                    <!-- Form -->
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Kategori Produk" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Harga Produk" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    </form>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
@endsection
