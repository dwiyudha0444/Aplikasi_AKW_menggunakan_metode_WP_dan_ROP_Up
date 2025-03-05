@extends('dashboard.admin.index')
@section('content')
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Customer Management</h2>
                <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p>
            </div>
            <div class="d-flex w-500p">
                <select class="form-control custom-select custom-select-sm mr-15">
                    <option selected="">Latest Products</option>
                    <option value="1">CRM</option>
                    <option value="2">Projects</option>
                    <option value="3">Statistics</option>
                </select>
                <select class="form-control custom-select custom-select-sm mr-15">
                    <option selected="">USA</option>
                    <option value="1">USA</option>
                    <option value="2">India</option>
                    <option value="3">Australia</option>
                </select>
                <select class="form-control custom-select custom-select-sm">
                    <option selected="">December</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="1">April</option>
                    <option value="2">May</option>
                    <option value="3">June</option>
                    <option value="1">July</option>
                    <option value="2">August</option>
                    <option value="3">September</option>
                    <option value="1">October</option>
                    <option value="2">November</option>
                    <option value="3">December</option>
                </select>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-sm-12">
                        <div class="card-group hk-dash-type-2">
                            <!-- Total Reseller -->
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="font-15 text-dark font-weight-500">Reseller</span>
                                    </div>
                                    <div>
                                        <span class="display-4 text-dark mb-2">{{ $totalReseller }}</span>
                                        <small class="text-muted">Total Reseller</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Admin -->
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="font-15 text-dark font-weight-500">Admin</span>
                                    </div>
                                    <div>
                                        <span class="display-4 text-dark mb-2">{{ $totalAdmin }}</span>
                                        <small class="text-muted">Total Admin</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Kurir -->
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="font-15 text-dark font-weight-500">Kurir</span>
                                    </div>
                                    <div>
                                        <span class="display-4 text-dark mb-2">{{ $totalKurir }}</span>
                                        <small class="text-muted">Total Kurir</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Owner -->
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="font-15 text-dark font-weight-500">Owner</span>
                                    </div>
                                    <div>
                                        <span class="display-4 text-dark mb-2">{{ $totalOwner }}</span>
                                        <small class="text-muted">Total Owner</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="hk-row">

                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header card-header-action">
                                <h6>Penjualan per Hari</h6>
                                <div class="d-flex align-items-center card-action-wrap">
                                    <div class="inline-block dropdown">
                                        <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#"
                                            role="button">
                                            <i class="ion ion-ios-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="penjualanChart" height="100"></canvas>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var ctx = document.getElementById('penjualanChart').getContext('2d');

                                var dataLabels = @json($penjualan->pluck('tanggal'));
                                var dataValues = @json($penjualan->pluck('total_qty'));

                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: dataLabels,
                                        datasets: [{
                                            label: 'Total Penjualan',
                                            data: dataValues,
                                            borderColor: '#28a745',
                                            backgroundColor: 'rgba(40, 167, 69, 0.2)',
                                            borderWidth: 2,
                                            pointBackgroundColor: '#28a745',
                                            fill: true
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Tanggal'
                                                }
                                            },
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Qty Produk'
                                                },
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->


    <!-- /Main Content -->
@endsection
