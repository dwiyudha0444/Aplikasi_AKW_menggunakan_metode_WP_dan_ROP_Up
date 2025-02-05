@extends('dashboard.admin.index')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="shopping-cart"></i></span>
                </span>
                Daftar Penilaian
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Penilaian</h5>
                    <p class="mb-40">Daftar penilaian yang dilakukan oleh pelanggan.</p>
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
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Nama Produk</th>
                                                <th>Kualitas Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Layanan Pelanggan</th>
                                                <th>Fleksibilitas Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; // Inisialisasi nomor urut
                                            @endphp
                                            @foreach ($ranking as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td> <!-- Menampilkan nomor urut -->
                                                    <td>{{ $row['id_user'] }}</td>
                                                    <td>{{ $row['kualitas_produk'] }}</td>
                                                    <td>{{ $row['harga_produk'] }}</td>
                                                    <td>{{ $row['layanan_pelanggan'] }}</td>
                                                    <td>{{ $row['ulasan_pelanggan'] }}</td>
                                                    <td>{{ $row['fleksibilitas_pembayaran'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tabel Hasil Perkalian dengan 5 -->
                <section class="hk-sec-wrapper mt-4">
                    <h5 class="hk-sec-title">Tabel Hasil Perkalian dengan 5</h5>
                    <p class="mb-40">Daftar penilaian yang sudah dikalikan dengan 5 untuk setiap reseller.</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Kualitas Produk (x5)</th>
                                                <th>Harga Produk (x5)</th>
                                                <th>Layanan Pelanggan (x5)</th>
                                                <th>Ulasan Pelanggan</th>
                                                <th>Fleksibilitas Pembayaran (x5)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; // Inisialisasi nomor urut untuk tabel kedua
                                            @endphp
                                            @foreach ($ranking as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td> <!-- Menampilkan nomor urut -->
                                                    <td>{{ $row['id_user'] }}</td>
                                                    <td>{{ $row['kualitas_produk'] * 5 }}</td> <!-- Hasil kali 5 -->
                                                    <td>{{ $row['harga_produk'] * 5 }}</td> <!-- Hasil kali 5 -->
                                                    <td>{{ $row['layanan_pelanggan'] * 5 }}</td> <!-- Hasil kali 5 -->
                                                    <td>{{ $row['ulasan_pelanggan'] * 5 }}</td>
                                                    <td>{{ $row['fleksibilitas_pembayaran'] * 5 }}</td> <!-- Hasil kali 5 -->
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
