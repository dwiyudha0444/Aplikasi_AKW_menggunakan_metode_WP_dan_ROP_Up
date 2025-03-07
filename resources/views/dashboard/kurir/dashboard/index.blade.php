@extends('dashboard.admin.index')

@section('content')
    <div class="container mt-4">
        <div class="hk-pg-header d-flex justify-content-between align-items-center">
            <h2 class="hk-pg-title font-weight-600">Dashboard Pengiriman</h2>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card card-sm">
                    <div class="card-body text-center">
                        <h6 class="font-weight-500">Belum Dibayar</h6>
                        <span class="display-4 text-dark">{{ $totalBelumDibayar }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-sm">
                    <div class="card-body text-center">
                        <h6 class="font-weight-500">Dikemas</h6>
                        <span class="display-4 text-dark">{{ $totalDikemas }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-sm">
                    <div class="card-body text-center">
                        <h6 class="font-weight-500">Dikirim</h6>
                        <span class="display-4 text-dark">{{ $totalDikirim }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-sm">
                    <div class="card-body text-center">
                        <h6 class="font-weight-500">Selesai</h6>
                        <span class="display-4 text-dark">{{ $totalSelesai }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
