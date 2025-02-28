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


                    @foreach ($cart as $item)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2">
                                        <img src="" class="img-fluid rounded-3" alt="pe">
                                    </div>
                                    <div class="col-md-4 d-flex flex-column">
                                        <p class="lead fw-normal mb-2">pe</p>
                                        <p class="mb-0">
                                            <span class="text-muted">Ukuran:</span>  |
                                            <span class="text-muted">Warna:</span> biru |
                                            <span class="text-muted">Stok:</span> 10
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="text-muted">Jumlah:</label>
                                        <input type="number" id="" class="form-control" value="" min="1">
                                    </div>
                                    <div class="col-md-2">
                                        <h5 class="mb-0">Rp</h5>
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
                                    <p>Total: Rp {{ number_format(50000 * 2 + 75000 * 1, 0, ',', '.') }}</p>
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
@endsection
