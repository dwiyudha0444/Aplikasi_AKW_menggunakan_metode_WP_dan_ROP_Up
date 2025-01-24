@extends('dashboard.admin.index')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tabel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Pemesanan</li>
        </ol>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="archive"></i></span></span>Daftar Pemesanan</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Riwayat Pemesanan</h5>
                    <p class="mb-40">Daftar pemesanan yang tersedia</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Total Harga</th>
                                                <th>Bukti Transfer</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemesanan as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->tanggal_pemesanan }}</td>
                                                    <td>
                                                        @if ($item->status_pemesanan == 'waiting approvement')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ ucfirst($item->status_pemesanan) }}</span>
                                                        @elseif ($item->status_pemesanan == 'paid')
                                                            <span
                                                                class="badge bg-success">{{ ucfirst($item->status_pemesanan) }}</span>
                                                        @elseif ($item->status_pemesanan == 'rejected')
                                                            <span
                                                                class="badge bg-danger">{{ ucfirst($item->status_pemesanan) }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-secondary">{{ ucfirst($item->status_pemesanan) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ number_format($item->total_harga, 2, ',', '.') }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#buktiTfModal-{{ $item->id }}">
                                                            Lihat Bukti TF
                                                        </button>
                                                        <div class="modal fade" id="buktiTfModal-{{ $item->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="modalLabel{{ $item->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modalLabel{{ $item->id }}">Bukti
                                                                            Transfer</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        @if ($item->image_bukti_tf)
                                                                            <img src="{{ asset('storage/' . $item->image_bukti_tf) }}"
                                                                                alt="Bukti Transfer" class="img-fluid">
                                                                        @else
                                                                            <p>Tidak ada bukti transfer tersedia.</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <!-- Cek jika status pemesanan bukan paid atau rejected -->
                                                                        @if ($item->status_pemesanan != 'paid' && $item->status_pemesanan != 'rejected')
                                                                            <!-- Tombol Konfirmasi -->
                                                                            <form
                                                                                action="{{ route('pemesanan.updateStatus', $item->id) }}"
                                                                                method="POST" style="display:inline;">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <input type="hidden"
                                                                                    name="status_pemesanan" value="paid">
                                                                                <button type="submit"
                                                                                    class="btn btn-success">Konfirmasi</button>
                                                                            </form>

                                                                            <!-- Tombol Tolak -->
                                                                            <form
                                                                                action="{{ route('pemesanan.updateStatus', $item->id) }}"
                                                                                method="POST" style="display:inline;">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <input type="hidden"
                                                                                    name="status_pemesanan"
                                                                                    value="rejected">
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Tolak</button>
                                                                            </form>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        {{-- <a href="{{ route('pemesanan.edit', $item->id) }}" class="mr-25"
                                                            data-toggle="tooltip" data-original-title="Ubah">
                                                            <i class="icon-pencil"></i>
                                                        </a> --}}

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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 10,
                "lengthChange": true,
                "order": [
                    [2, "desc"]
                ]
            });
        });
    </script>
@endsection
