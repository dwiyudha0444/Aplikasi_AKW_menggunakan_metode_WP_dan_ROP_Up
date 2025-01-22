@extends('dashboard.admin.index')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Pemesanan Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pemesanan Produk</li>
        </ol>
    </nav>

    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="plus-circle"></i></span></span>Tambah Pemesanan Produk</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Form Pemesanan Produk</h5>
                    <p class="mb-20">Masukkan data pemesanan produk baru</p>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-wrap">
                                <form action="{{ route('pemesanan_produk.store') }}" method="POST">
                                    @csrf
                                    <div id="produk-container">
                                        <div class="produk-item">
                                            <div class="form-group mt-2">
                                                <label for="id_produk">Nama Produk</label>
                                                <select class="form-control id_produk" name="id_produk[]" required>
                                                    <option value="" disabled selected>Pilih Produk</option>
                                                    @foreach ($produk as $item)
                                                        <option value="{{ $item->id }}"
                                                            data-harga="{{ $item->harga }}">
                                                            {{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="form-group col-md-4">
                                                    <label for="qty_produk">Jumlah Produk</label>
                                                    <input type="number" class="form-control qty_produk"
                                                        name="qty_produk[]" min="1" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="harga">Harga Produk</label>
                                                    <input type="number" class="form-control harga" name="harga[]"
                                                        readonly>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="total_harga">Total Harga</label>
                                                    <input type="number" class="form-control total_harga"
                                                        name="total_harga[]" readonly>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-remove-produk">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button type="button" id="btn-add-produk" class="btn btn-success mt-3">Tambah
                                        Produk</button>

                                    <div class="form-group mt-4">
                                        <label for="grand_total">Total Harga Keseluruhan</label>
                                        <input type="number" class="form-control" id="grand_total" name="grand_total"
                                            readonly>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Pesan</button>
                                    <a href="{{ route('pemesanan_produk.index') }}"
                                        class="btn btn-secondary ml-3 mt-3">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function calculateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.total_harga').forEach(input => {
                const value = parseFloat(input.value) || 0;
                grandTotal += value;
            });
            document.getElementById('grand_total').value = grandTotal;
        }

        document.getElementById('btn-add-produk').addEventListener('click', function() {
            const container = document.getElementById('produk-container');
            const produkItem = document.querySelector('.produk-item').cloneNode(true);

            // Reset nilai input
            produkItem.querySelectorAll('input').forEach(input => input.value = '');
            produkItem.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

            container.appendChild(produkItem);
        });

        document.getElementById('produk-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-remove-produk')) {
                e.target.closest('.produk-item').remove();
                calculateGrandTotal();
            }
        });

        document.getElementById('produk-container').addEventListener('change', function(e) {
            if (e.target.classList.contains('id_produk')) {
                const selectedOption = e.target.options[e.target.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');

                const produkItem = e.target.closest('.produk-item');
                produkItem.querySelector('.harga').value = harga;

                const qty = produkItem.querySelector('.qty_produk').value || 0;
                produkItem.querySelector('.total_harga').value = qty * harga;

                calculateGrandTotal();
            }
        });

        document.getElementById('produk-container').addEventListener('input', function(e) {
            if (e.target.classList.contains('qty_produk')) {
                const produkItem = e.target.closest('.produk-item');
                const qty = e.target.value || 0;
                const harga = produkItem.querySelector('.harga').value || 0;

                produkItem.querySelector('.total_harga').value = qty * harga;

                calculateGrandTotal();
            }
        });
    </script>
@endsection
