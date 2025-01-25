@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="truck"></i></span>
                </span>
                Daftar Pengiriman
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Pengiriman</h5>
                    <p class="mb-40">Daftar pengiriman produk yang harus diproses oleh kurir.</p>
                    {{-- <div class="row mb-3">
                        <div class="col-sm">
                            <a href="{{ route('create_admin_produk') }}" class="btn btn-primary">
                                <i class="icon-plus"></i> Tambah Produk
                            </a>
                        </div>
                    </div> --}}
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
                                                <th>Nama Reseller</th>
                                                <th>ID Produk</th>
                                                <th>Qty Produk</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                                <th>Total Harga</th>
                                                <th>Dibuat Pada</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengiriman as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->pemesanan->user->name }}</td>
                                                    <td>{{ $item->produk->nama }}</td>
                                                    <td>{{ $item->qty_produk }}</td>
                                                    <td>
                                                        <span
                                                            class="badge 
        @if ($item->pemesanan->status_pengiriman == 'BelumBayar') badge-danger
        @elseif($item->pemesanan->status_pengiriman == 'Dikemas') badge-warning
        @elseif($item->pemesanan->status_pengiriman == 'Selesai') badge-success @endif">
                                                            {{ $item->pemesanan->status_pengiriman }}
                                                        </span>
                                                    </td>
                                                    <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('edit_admin_produk', $item->id) }}"
                                                            class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        {{-- <a href="{{ route('products.destroy', $product->id) }}",
                                                            class="text-danger" data-toggle="tooltip"
                                                            data-original-title="Hapus"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                            <i class="icon-trash"></i>
                                                        </a> --}}
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
