@extends('dashboard.reseller.layout.index')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Riwayat Transaksi</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Tanggal Transaksi</th>
                        <th>Total Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Transfer</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->order_id }}</td>
                            <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                            <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($transaction->status_pemesanan == 'waiting approvement')
                                    Menunggu Persetujuan
                                @elseif ($transaction->status_pemesanan == 'approved')
                                    Disetujui
                                @elseif ($transaction->status_pemesanan == 'rejected')
                                    Ditolak
                                @else
                                    Status Tidak Diketahui
                                @endif
                            </td>
                            <td>
                                @if ($transaction->image_bukti_tf)
                                    <a href="{{ asset('storage/' . $transaction->image_bukti_tf) }}" target="_blank">Lihat
                                        Bukti</a>
                                @else
                                    <span class="text-muted">Tidak ada bukti</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada riwayat transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
