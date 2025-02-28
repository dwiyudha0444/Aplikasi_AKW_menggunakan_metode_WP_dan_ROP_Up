@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_stok') }}">Daftar Stok</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Stok</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="edit"></i></span></span>Edit Stok</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Form Edit Stok</h5>
                    <p class="mb-40">Ubah data stok sesuai kebutuhan</p>
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
                    <form action="{{ route('update_admin_stok', $stok->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="id_produk">Produk</label>
                            <select class="form-control" id="id_produk" name="id_produk" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $stok->id_produk ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $stok->id_kategori ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="ukuran">Ukuran</label>
                            <select class="form-control" id="ukuran" name="ukuran" required>
                            
                                <option value="XS" {{ $stok->ukuran == 'XS' ? 'selected' : '' }}>XS</option>
                                <option value="S" {{ $stok->ukuran == 'S' ? 'selected' : '' }}>S</option>
                                <option value="M" {{ $stok->ukuran == 'M' ? 'selected' : '' }}>M</option>
                                <option value="L" {{ $stok->ukuran == 'L' ? 'selected' : '' }}>L</option>
                                <option value="XL" {{ $stok->ukuran == 'XL' ? 'selected' : '' }}>XL</option>
                                <option value="XXL" {{ $stok->ukuran == 'XXL' ? 'selected' : '' }}>XXL</option>
                                <option value="XXXL" {{ $stok->ukuran == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                                <option value="XXXXL" {{ $stok->ukuran == 'XXXXL' ? 'selected' : '' }}>XXXXL</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="warna">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna"
                                value="{{ $stok->warna }}" placeholder="Warna Produk" required>
                        </div>

                        <div class="form-group">
                            <label for="model_motif">Model/Motif</label>
                            <input type="text" class="form-control" id="model_motif" name="model_motif"
                                value="{{ $stok->model_motif }}" placeholder="Model atau Motif" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="{{ $stok->jumlah }}" placeholder="Jumlah Stok" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Stok</button>
                    </form>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
@endsection
