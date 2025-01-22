@extends('dashboard.admin.index')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Pemesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pemesanan</li>
        </ol>
    </nav>

    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Tambah Pemesanan</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Form Pemesanan Baru</h5>
                    <p class="mb-40">Isi formulir berikut untuk menambahkan pemesanan baru</p>

                    <!-- Form Tambah Pemesanan -->
                    <form action="{{ route('pemesanan.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_user">Reseller</label>
                                <select id="id_user" name="id_user" class="form-control" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('id_user') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                                <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan"
                                    value="{{ old('tanggal_pemesanan') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status_pemesanan">Status Pemesanan</label>
                                <select id="status_pemesanan" name="status_pemesanan" class="form-control" required>
                                    <option value="pending" {{ old('status_pemesanan') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="approved" {{ old('status_pemesanan') == 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="shipped" {{ old('status_pemesanan') == 'shipped' ? 'selected' : '' }}>
                                        Shipped</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="total_harga">Total Harga</label>
                                <input type="number" class="form-control" id="total_harga" name="total_harga"
                                    value="{{ old('total_harga') }}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Pemesanan</button>
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
