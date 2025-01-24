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
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Pemesan</th>
                                        <th>Qty Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Status Pemesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesananProduk as $index => $pemesanan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pemesanan->pemesanan->tanggal_pemesanan }}</td>
                                            <td>{{ $pemesanan->produk->nama }}</td>
                                            <td>{{ $pemesanan->pemesanan->user->name }}</td>
                                            <td>{{ $pemesanan->qty_produk }}</td>
                                            <td>{{ number_format($pemesanan->produk->harga, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($pemesanan->pemesanan->status_pemesanan == 'waiting approvement')
                                                    <span
                                                        class="badge bg-warning text-dark">{{ ucfirst($pemesanan->pemesanan->status_pemesanan) }}</span>
                                                @elseif ($pemesanan->pemesanan->status_pemesanan == 'paid')
                                                    <span
                                                        class="badge bg-success">{{ ucfirst($pemesanan->pemesanan->status_pemesanan) }}</span>
                                                @elseif ($pemesanan->pemesanan->status_pemesanan == 'rejected')
                                                    <span
                                                        class="badge bg-danger">{{ ucfirst($pemesanan->pemesanan->status_pemesanan) }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-secondary">{{ ucfirst($pemesanan->pemesanan->status_pemesanan) }}</span>
                                                @endif
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
                </section>
            </div>
        </div>
    </div>
    </div>
@endsection
