@extends('dashboard.reseller.layout.index')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="modal fade" id="buktiTfModal" tabindex="-1" role="dialog" aria-labelledby="buktiTfModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiTfModalLabel">Bukti Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Gambar Bukti Transfer -->
                    <img id="buktiTfImage" src="" alt="Bukti Transfer" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

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
            <th>Komentar</th>
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
                        <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                    @elseif ($transaction->status_pemesanan == 'paid')
                        <span class="badge bg-success">Paid</span>
                    @elseif ($transaction->status_pemesanan == 'rejected')
                        <span class="badge bg-danger">Rejected</span>
                    @else
                        <span class="badge bg-secondary">Status Tidak Diketahui</span>
                    @endif
                </td>
                <td>{{ $transaction->komentar }}</td>
                <td>
                    @if ($transaction->image_bukti_tf)
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#buktiTfModal"
                            onclick="showBukti('{{ asset('storage/' . $transaction->image_bukti_tf) }}')">
                            <i class="fas fa-eye"></i> View
                        </button>
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

<!-- Tambahkan navigasi pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $transactions->links('pagination::bootstrap-5') }}
</div>

        </div>
    </div>
    <script>
        function showBukti(imageUrl) {
            const imageElement = document.getElementById('buktiTfImage');
            imageElement.src = imageUrl;
        }
    </script>

@endsection
