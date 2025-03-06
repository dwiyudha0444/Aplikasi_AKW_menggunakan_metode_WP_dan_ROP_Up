@extends('dashboard.reseller.layout.index')

@section('content')
    <header class="bg-light py-5 mt-0">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-black">
                <h1 class="display-4 fw-bolder">Catalog Product</h1>
                <p class="lead fw-normal text-black-50 mb-0">choose our product to shop</p>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        @if ($product->is_sale)
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                        @endif
                        <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->nama }}" />

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $product->nama }}</h5>
                                @if ($product->rating)
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < 5; $i++)
                                            <div class="bi-star{{ $i < $product->rating ? '-fill' : '' }}"></div>
                                        @endfor
                                    </div>
                                @endif
                                @if ($product->is_sale)
                                    <span
                                        class="text-muted text-decoration-line-through">Rp{{ number_format($product->harga, 2) }}</span>
                                @endif
                                Rp{{ number_format($product->harga, 2) }}
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-dark mt-auto add-to-cart"
    data-id="{{ $product->id_produk }}"
    data-id-ukuran="{{ $product->id_ukuran ?? '' }}"
    data-stok="1"
    data-harga="{{ $product->harga }}"
    data-warna="{{ $product->warna ?? '' }}"
    data-model-motif="{{ $product->model_motif ?? '' }}">
    Add to cart
</button>



                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    $(".add-to-cart").click(function() {
        var productId = $(this).data("id");
        var idUkuran = $(this).data("id-ukuran");
        var stok = $(this).data("stok");
        var harga = $(this).data("harga");
        var warna = $(this).data("warna");
        var modelMotif = $(this).data("model-motif");

        $.ajax({
            url: "{{ route('cart.add') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id_produk: productId,
                id_ukuran: idUkuran,
                stok: stok,
                harga: harga,
                warna: warna,
                model_motif: modelMotif
            },
            success: function(response) {
                alert("Produk berhasil ditambahkan ke keranjang!");
            },
            error: function(xhr) {
                alert("Terjadi kesalahan: " + xhr.responseJSON.error);
            }
        });
    });
});

    </script>
@endsection
