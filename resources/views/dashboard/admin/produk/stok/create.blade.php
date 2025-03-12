@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_stok') }}">Daftar Stok</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Stok</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Tambah Stok</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Form Tambah Stok</h5>
                    <p class="mb-40">Isi data stok baru yang akan ditambahkan</p>
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
                    <form action="{{ route('store_admin_stok') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="id_produk">Produk</label>
                            <select class="form-control" id="id_produk" name="id_produk" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->id_produk }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="ukuran">Ukuran</label>
                            <select class="form-control" id="ukuran" name="ukuran" required>
                                <option value="" disabled selected>Pilih Ukuran</option>
                                @foreach ($ukuran as $u)
                                    <option value="{{ $u->ukuran }}">{{ $u->ukuran }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="warna">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna"
                                placeholder="Warna Produk" required>
                        </div>

                        <div class="form-group">
                            <label for="model_motif">Model/Motif</label>
                            <input type="text" class="form-control" id="model_motif" name="model_motif"
                                placeholder="Model atau Motif" required>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                placeholder="Jumlah Stok" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Stok</button>
                    </form>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
@endsection
