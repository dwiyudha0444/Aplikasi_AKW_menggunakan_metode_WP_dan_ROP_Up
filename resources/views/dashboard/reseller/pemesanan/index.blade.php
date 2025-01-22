@extends('dashboard.reseller.layout.index')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Pemesanan</li>
        </ol>
    </nav>

    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Daftar Pemesanan</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Pemesanan</h5>
                    <p class="mb-40">Daftar pemesanan yang tersedia</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <a href="{{ route('pemesanan_produk.create') }}" class="btn btn-primary">
                                    <i class="icon-plus"></i> Tambah Pemesanan
                                </a>
                            </div>
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemesanan as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->tanggal_pemesanan }}</td>
                                                    <td>{{ ucfirst($item->status_pemesanan) }}</td>
                                                    <td>{{ number_format($item->total_harga, 2, ',', '.') }}</td>
                                                    <td>
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('pemesanan.edit', $item->id) }}" class="mr-25"
                                                            data-toggle="tooltip" data-original-title="Ubah">
                                                            <i class="icon-pencil"></i>
                                                        </a>

                                                        <!-- Delete Button with Confirmation -->
                                                        <a href="javascript:void(0);" class="text-danger"
                                                            data-toggle="tooltip" data-original-title="Hapus"
                                                            onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('pemesanan.destroy', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
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
    </div>
@endsection
