@extends('dashboard.admin.index')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemesanan Produk</li>
        </ol>
    </nav>

    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Pemesanan Produk</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Pemesanan Produk</h5>
                    <p class="mb-40">Daftar produk yang telah dipesan oleh reseller</p>
                    <div class="row">
                        {{-- <div class="col-sm">
                              <a href="{{ route('pemesanan_produk.create') }}" class="btn btn-primary mb-3">
                        <i class="icon-plus-circle"></i> Pesan Produk
                    </a> --}}
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Produk</th>
                                            <th>Nama Pemesan</th>
                                            <th>Qty Produk</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                            <th>Status Pemesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemesananProduk as $index => $pemesanan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pemesanan->produk->nama }}</td>
                                                <td>{{ $pemesanan->pemesanan->user->name }}</td>
                                                <td>{{ $pemesanan->qty_produk }}</td>
                                                <td>{{ $pemesanan->produk->harga }}</td>
                                                <td>{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</td>
                                                <td>{{ ucfirst($pemesanan->pemesanan->status_pemesanan) }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('pemesanan_produk.show', $pemesanan->id) }}" 
                                                           class="mr-25" data-toggle="tooltip" data-original-title="Detail">
                                                            <i class="icon-eye"></i>
                                                        </a> --}}
                                                    <!-- Anda bisa menambahkan aksi edit atau hapus di sini -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @if ($pemesananProduk->isEmpty())
                                    <p class="text-center mt-4">Tidak ada pemesanan produk yang tersedia.</p>
                                @endif

                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
    </div>
    </div>
@endsection
