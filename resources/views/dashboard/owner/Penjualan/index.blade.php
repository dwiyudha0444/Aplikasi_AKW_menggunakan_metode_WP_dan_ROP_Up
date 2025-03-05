@extends('dashboard.admin.index')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="credit-card"></i></span>
                </span>
                Daftar Transaksi
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Transaksi</h5>
                    <p class="mb-40">Daftar transaksi pemesanan yang dilakukan oleh reseller.</p>
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
                                                <th>Reseller</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Total Harga</th>
                                                <th>Bukti Transfer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemesanan as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <span
                                                            class="badge 
        @if ($item->status_pemesanan == 'Pending') badge-warning
        @elseif($item->status_pemesanan == 'Selesai') badge-success
        @elseif($item->status_pemesanan == 'Dibatalkan') badge-danger @endif">
                                                            {{ $item->status_pemesanan }}
                                                        </span>
                                                    </td>
                                                    <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                                    <td>
                                                        <!-- Tombol untuk membuka modal -->
                                                        <a href="#buktiTfModal{{ $item->id }}"
                                                            class="btn btn-outline-primary btn-sm">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>

                                                        <!-- Modal -->
                                                        <!-- Modal -->
                                                        <div id="buktiTfModal{{ $item->id }}" class="modal">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5>Bukti Transfer</h5>
                                                                    <button class="close"
                                                                        onclick="closeModal('{{ $item->id }}')">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if ($item->image_bukti_tf)
                                                                        <img src="{{ asset('storage/' . $item->image_bukti_tf) }}"
                                                                            alt="Bukti Transfer" class="img-preview">
                                                                    @else
                                                                        <p>Tidak ada bukti transfer tersedia.</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Cek jika status pemesanan bukan paid atau rejected -->
                                                        @if ($item->status_pemesanan != 'paid' && $item->status_pemesanan != 'rejected')
                                                            <!-- Tombol Konfirmasi -->
                                                            {{-- <form action="{{ route('pemesanan.updateStatus', $item->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="status_pemesanan"
                                                                    value="paid">
                                                                <button type="submit"
                                                                    class="btn btn-success">Konfirmasi</button>
                                                            </form>

                                                            <!-- Tombol Tolak -->
                                                            <form action="{{ route('pemesanan.updateStatus', $item->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="status_pemesanan"
                                                                    value="rejected">
                                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                                            </form> --}}
                                                        @endif
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
    <script>
        function closeModal(id) {
            let modal = document.getElementById("buktiTfModal" + id);
            if (modal) {
                modal.style.display = "none";
                window.location.hash = ""; // Hapus hash dari URL
            }
        }

        // Agar modal tetap bisa dibuka dengan klik
        document.querySelectorAll(".btn-outline-primary").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                let targetModal = document.querySelector(this.getAttribute("href"));
                if (targetModal) {
                    targetModal.style.display = "flex";
                }
            });
        });

        // Tutup modal saat klik di luar konten modal
        window.onclick = function(event) {
            document.querySelectorAll(".modal").forEach(modal => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        };
    </script>

    <style>
        /* Supaya modal tertutup secara default */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            text-align: center;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Modal terlihat saat ditargetkan */
        .modal:target {
            display: flex;
        }

        /* Konten modal */
        .modal-content {
            background: #fff;
            padding: 20px;
            width: 50%;
            border-radius: 8px;
            position: relative;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Tombol Close */
        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #000;
        }

        .close:hover {
            color: red;
        }

        /* Gambar Preview */
        .img-preview {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
    <!-- /Container -->
@endsection
