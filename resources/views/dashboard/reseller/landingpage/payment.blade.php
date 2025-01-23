@extends('dashboard.reseller.layout.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <h3 class="text-center mb-4 text-dark mt-5">Payment Confirmation</h3>

            @if(session('success'))
                <div class="alert alert-success text-white">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger text-white">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('payment.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="order_id" class="form-label">Order ID</label>
                    <!-- Menampilkan Order ID dari parameter yang diteruskan -->
                    <input type="text" name="order_id" id="order_id" 
                        class="form-control" 
                        placeholder="Order ID" 
                        value="{{ old('order_id', $order_id ?? '') }}" 
                        required readonly>
                </div>

                <div class="mb-3">
                    <label for="image_bukti_tf" class="form-label">Upload Payment Proof</label>
                    <input type="file" name="image_bukti_tf" id="image_bukti_tf" 
                        class="form-control" 
                        accept="image/*" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Total Amount</label>
                    <!-- Menampilkan Total Amount dari total_harga di pemesanan -->
                    <p class="form-control bg-light">{{ isset($total) ? 'Rp ' . number_format($total, 0, ',', '.') : 'Rp 0' }}</p>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Submit Payment
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
