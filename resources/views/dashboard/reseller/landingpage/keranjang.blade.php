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

                    <form action="{{ route('cart.checkout') }}" method="POST" id="checkout-form">
                        @csrf
                        @foreach ($keranjang as $item)
                            <div class="card rounded-3 mb-4 keranjang-item" id="keranjang-{{ $item->id_keranjang }}">
                                {{ $item->id_produk }}
                                <div class="card-body p-4">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-2">
                                            <img src="" class="img-fluid rounded-3" alt="pe">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-muted">Pilih Varian:</label>
                                            <select class="form-select varian-select" name="varian[{{ $item->id_stok }}]">
                                                @foreach ($stok->where('id_produk', $item->id_produk) as $s)
                                                    <option value="{{ $s->id_stok }}" data-harga="{{ $s->harga }}"
                                                        data-stok="{{ $s->jumlah }}">
                                                        {{ $s->ukuran }} - {{ $s->warna }} - {{ $s->model_motif }} -
                                                        Stok: {{ $s->jumlah }} -
                                                        Rp{{ number_format($s->harga, 0, ',', '.') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- Input hidden untuk menyimpan id_stok -->
                                            <input type="text" class="id-stok-input" name="id_stok[{{ $item->id_keranjang }}]"
                                                value="">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control jumlah-input"
                                                name="qty_produk[{{ $item->id_keranjang }}]" value="1" min="1">
                                        </div>
                                        <div class="col-md-2 text-end">
                                            <p class="total-item">Rp 0</p> <!-- Menampilkan total per item -->
                                            <input type="text" class="total-item-input"
                                                name="total_item[{{ $item->id_keranjang }}]" value="0">
                                            <button type="button" class="btn btn-danger hapus-btn"
                                                data-id="{{ $item->id_keranjang }}">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- Total Harga -->
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-3">
                                        <p class="lead fw-normal mb-2"><strong>Total</strong></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Total Produk: <span id="total-produk">0</span></p>
                                        <p>Total Harga: Rp <span id="total-harga">0</span></p>
                                        <p>Harga Setelah Diskon: Rp <span id="total-harga-diskon">0</span></p>

                                        <!-- Input tersembunyi untuk dikirim ke backend -->
                                        <input type="hidden" id="total-harga-input" name="total_harga">
                                        <input type="hidden" id="total-harga-diskon-input" name="total_harga_diskon">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Form Checkout -->


                        <input type="hidden" name="total_harga" id="total-harga-input">
                        <button type="submit" class="btn btn-warning btn-block btn-lg">Checkout</button>
                    </form>

                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Saat halaman dimuat, atur nilai id_stok pertama kali
            document.querySelectorAll(".varian-select").forEach(function(select) {
                let hiddenInput = select.closest(".keranjang-item").querySelector(".id-stok-input");
                hiddenInput.value = select.value;

                select.addEventListener("change", function() {
                    hiddenInput.value = this.value; // Update id_stok saat varian berubah
                });
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateTotal() {
                let totalHarga = 0;
                let totalProduk = 0;

                document.querySelectorAll(".keranjang-item").forEach(item => {
                    let jumlahInput = item.querySelector(".jumlah-input");
                    let varianSelect = item.querySelector(".varian-select");
                    let totalItemElement = item.querySelector(".total-item");
                    let totalItemInput = item.querySelector(".total-item-input");

                    let jumlah = parseInt(jumlahInput.value) || 0;
                    let harga = parseFloat(varianSelect.selectedOptions[0].dataset.harga) || 0;
                    let totalItem = jumlah * harga;

                    totalHarga += totalItem;
                    totalProduk += jumlah;

                    // Update tampilan total per item
                    totalItemElement.textContent = "Rp " + totalItem.toLocaleString("id-ID");

                    // Update input hidden total per item
                    totalItemInput.value = jumlah;
                });

                // Hitung total harga setelah diskon 10%
                let totalDiskon = totalHarga * 0.1;
                let totalHargaDiskon = totalHarga - totalDiskon;

                // Update tampilan total keseluruhan
                document.getElementById("total-harga").textContent = totalHarga.toLocaleString("id-ID");
                document.getElementById("total-produk").textContent = totalProduk;
                document.getElementById("total-harga-input").value = totalHarga;

                // Update tampilan total setelah diskon
                document.getElementById("total-harga-diskon").textContent = totalHargaDiskon.toLocaleString(
                    "id-ID");
                document.getElementById("total-harga-diskon-input").value = totalHargaDiskon;
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
                let itemId = $(this).data("id_keranjang"); // Ambil ID dari atribut data-id
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