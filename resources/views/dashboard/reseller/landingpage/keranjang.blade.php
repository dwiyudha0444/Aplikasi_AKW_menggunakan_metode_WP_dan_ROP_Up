@extends('dashboard.reseller.layout.index')

@section('content')
    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="d-flex flex-column align-items-start mb-4">
                        <h3 class="fw-normal mb-2">Shopping Cart</h3>
                        <div class="mt-3">
                            <a href="#" class="btn btn-secondary">Back</a>
                        </div>
                    </div>

                    <!-- Data Dummy -->


                    @foreach ($keranjang as $item)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2">
                                        <img src="" class="img-fluid rounded-3" alt="pe">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-muted">Pilih Varian:</label>
                                        <select class="form-select varian-select" data-harga="harga-{{ $item->id_produk }}">
                                            @foreach ($stok->where('id_produk', $item->id_produk) as $s)
                                                <option
                                                    value="{{ $s->ukuran }} - {{ $s->warna }} - {{ $s->model_motif }} - Stok: {{ $s->jumlah }}"
                                                    data-harga="{{ $s->harga }}">
                                                    {{ $s->ukuran }} - {{ $s->warna }} - {{ $s->model_motif }} -
                                                    Stok: {{ $s->jumlah }} -
                                                    Rp{{ number_format($s->harga, 0, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control jumlah-input" value="1"
                                            min="1">
                                    </div>

                                    <div class="col-md-2 text-end">
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-3">
                                    <p class="lead fw-normal mb-2"><strong>Total</strong></p>
                                </div>
                                <div class="col-md-3">
                                    <p>Total: Rp <span id="total-harga">0</span></p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning btn-block btn-lg">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    function hitungTotal() {
        let totalHarga = 0;

        document.querySelectorAll(".varian-select").forEach(function (select) {
            let harga = parseFloat(select.selectedOptions[0].dataset.harga || 0);
            let jumlah = parseInt(select.closest(".card-body").querySelector(".jumlah-input").value) || 1;
            totalHarga += harga * jumlah;
        });

        document.getElementById("total-harga").innerText = "Rp " + totalHarga.toLocaleString("id-ID");
    }

    document.querySelectorAll(".varian-select, .jumlah-input").forEach(function (element) {
        element.addEventListener("change", hitungTotal);
    });

    hitungTotal(); // Hitung total saat halaman dimuat
});

    </script>
@endsection
