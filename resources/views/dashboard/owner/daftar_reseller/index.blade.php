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
                                                <th>Ulasan Pelanggan</th>
                                                <th>Fleksibilitas Pembayaran</th>
                                                <th>Komentar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach (getAllPenilaian() as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td> 
                                                    <td>{{ $item->pemesanan->user->name }} </td>
                                                    <td>{{ $item->pemesananProduk->produk->nama }}</td>
                                                    <td>{{ $item->kualitas_produk }}</td>
                                                    <td>{{ $item->harga_produk }}</td>
                                                    <td>{{ $item->layanan_pelanggan }}</td>
                                                    <td>{{ $item->ulasan_pelanggan }}</td>
                                                    <td>{{ $item->fleksibilitas_pembayaran }}</td>
                                                    <td>{{ $item->komentar }}</td>
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
