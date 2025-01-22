@extends('dashboard.reseller.layout.index')

@section('content')
   <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge (jika produk diskon)-->
                    @if($product->is_sale)
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    @endif
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->nama }}" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->nama }}</h5>
                            <!-- Product reviews (jika ada rating)-->
                            @if($product->rating) <!-- Assuming you have a rating column in your database -->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    @for($i = 0; $i < 5; $i++)
                                        <div class="bi-star{{ $i < $product->rating ? '-fill' : '' }}"></div>
                                    @endfor
                                </div>
                            @endif
                            <!-- Product price-->
                            @if($product->is_sale) 
                                <span class="text-muted text-decoration-line-through">Rp{{ number_format($product->harga, 2) }}</span>
                            @endif
                            Rp{{ number_format($product->harga, 2) }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
