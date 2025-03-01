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
                        <div class="card rounded-3 mb-4 keranjang-item" id="keranjang-{{ $item->id }}">
                            <div class="card-body p-4">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2">
                                        <img src="" class="img-fluid rounded-3" alt="pe">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-muted">Pilih Varian:</label>
                                        <select class="form-select varian-select">
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
                                        <button type="button" class="btn btn-danger hapus-btn"
                                            data-id="{{ $item->id }}">Hapus</button>
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
                                    <p>Total Produk: <span id="total-produk">0</span></p>
                                    <p>Total Harga: Rp <span id="total-harga">0</span></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="total_harga" id="total-harga-input">
                            <button type="submit" class="btn btn-warning btn-block btn-lg">Checkout</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    function updateTotal() {
        let totalHarga = 0;
        let totalProduk = 0;

        document.querySelectorAll(".keranjang-item").forEach(item => {
            let jumlah = item.querySelector(".jumlah-input").value;
            let harga = item.querySelector(".varian-select").selectedOptions[0].dataset.harga;
            totalHarga += jumlah * harga;
            totalProduk += parseInt(jumlah);
        });

        document.getElementById("total-harga").textContent = totalHarga.toLocaleString();
        document.getElementById("total-produk").textContent = totalProduk;
        document.getElementById("total-harga-input").value = totalHarga; // Update input hidden
    }

    // Update total saat jumlah produk atau varian berubah
    document.querySelectorAll(".jumlah-input, .varian-select").forEach(input => {
        input.addEventListener("change", updateTotal);
    });

    // Panggil update total pertama kali saat halaman dimuat
    updateTotal();
});
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".hapus-btn").click(function() {
                let itemId = $(this).data("id"); // Ambil ID dari atribut data-id
                let itemElement = $("#keranjang-" + itemId); // Ambil elemen kartu keranjang

                $.ajax({
                    url: "/keranjang/" + itemId,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}" // Kirim token CSRF untuk keamanan
                    },
                    success: function(response) {
                        if (response.success) {
                            itemElement.remove(); // Hapus elemen dari tampilan
                            hitungTotal(); // Perbarui total harga
                        }
                    },
                    error: function(xhr) {
                        alert("Gagal menghapus item");
                    }
                });
            });

            function hitungTotal() {
                let totalHarga = 0;

                $(".keranjang-item").each(function() {
                    let select = $(this).find(".varian-select");
                    let harga = parseFloat(select.find(":selected").data("harga")) || 0;
                    let jumlah = parseInt($(this).find(".jumlah-input").val()) || 1;
                    totalHarga += harga * jumlah;
                });

                $("#total-harga").text("Rp " + totalHarga.toLocaleString("id-ID"));
            }

            $(".varian-select, .jumlah-input").change(hitungTotal);
            hitungTotal();
        });
    </script>


    <script>
        $(document).ready(function() {
            function hitungTotal() {
                let totalHarga = 0;
                let totalProduk = 0;

                $(".keranjang-item").each(function() {
                    let select = $(this).find(".varian-select");
                    let harga = parseFloat(select.find(":selected").data("harga")) || 0;
                    let jumlah = parseInt($(this).find(".jumlah-input").val()) || 1;

                    totalHarga += harga * jumlah;
                    totalProduk += jumlah;
                });

                $("#total-harga").text(totalHarga.toLocaleString("id-ID"));
                $("#total-produk").text(totalProduk);
            }

            $(".varian-select, .jumlah-input").change(hitungTotal);
            $(".hapus-btn").click(function() {
                $(this).closest(".keranjang-item").remove();
                hitungTotal();
            });

            hitungTotal();
        });
    </script>
@endsection
