@extends('dashboard.admin.index')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    @php
    $users = DB::table('users')->pluck('name', 'id')->toArray(); // Ambil semua user sekali saja
@endphp


    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="shopping-cart"></i></span>
                </span>
                Daftar Penilaian
            </h4>
        </div>
        <!-- /Title -->

        <a href="{{ route('generate.pdf') }}" class="btn btn-primary mb-3">
            <i class="fa fa-download"></i> Download PDF
        </a>


        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper mt-4">
                    <h5 class="hk-sec-title">Tabel Bobot</h5>
                    <p class="mb-40">A. Normalisasi Bobot</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Kualitas Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Layanan Pelanggan</th>
                                                <th>Ulasan Pelanggan</th>
                                                <th>Fleksibilitas Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; // Inisialisasi nomor urut
                                                $grandTotal = 0; // Total semua data
                                            @endphp
                                            <td>{{ $no++ }}</td>
                                            <td>0,25</td>
                                            <td>-0,25</td>
                                            <td>0,15</td>
                                            <td>0,2</td>
                                            <td>0,15</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tabel Matriks Perbandingan dan Kriteria</h5>
                    <p class="mb-40">B. Membuat Matriks Perbandingan dan Kriteria</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <table class="table table-hover table-bordered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Kualitas Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Layanan Pelanggan</th>
                                                <th>Ulasan Pelanggan</th>
                                                <th>Fleksibilitas Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; // Inisialisasi nomor urut
                                            @endphp
                                            @foreach ($ranking as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td> <!-- Menampilkan nomor urut -->
                                                    <td>{{ $users[$row['id_user']] ?? 'Tidak Diketahui' }}</td>
                                                    <td>{{ $row['kualitas_produk'] }}</td>
                                                    <td>{{ $row['harga_produk'] }}</td>
                                                    <td>{{ $row['layanan_pelanggan'] }}</td>
                                                    <td>{{ $row['ulasan_pelanggan'] }}</td>
                                                    <td>{{ $row['fleksibilitas_pembayaran'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tabel Hasil Perkalian dengan 5 -->
                <section class="hk-sec-wrapper mt-4">
                    <h5 class="hk-sec-title">Tabel Hasil Vektor S</h5>
                    <p class="mb-40">C. Menghitung Nilai Vektor S</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Kualitas Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Layanan Pelanggan</th>
                                                <th>Ulasan Pelanggan</th>
                                                <th>Fleksibilitas Pembayaran</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; // Inisialisasi nomor urut
                                                $grandTotal = 0; // Total semua data
                                            @endphp
                                            @foreach ($ranking as $row)
                                                @php
                                                    // Hitung total untuk baris saat ini
                                                    $rowTotal =
                                                        pow($row['kualitas_produk'], 0.25) *
                                                        pow($row['harga_produk'], -0.25) *
                                                        pow($row['layanan_pelanggan'], 0.15) *
                                                        pow($row['ulasan_pelanggan'], 0.2) *
                                                        pow($row['fleksibilitas_pembayaran'], 0.15);

                                                    // Tambahkan ke grand total
                                                    $grandTotal += $rowTotal;
                                                @endphp
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $users[$row['id_user']] ?? 'Tidak Diketahui' }}</td>
                                                    <td>{{ number_format(pow($row['kualitas_produk'], 0.25), 2) }}</td>
                                                    <td>{{ number_format(pow($row['harga_produk'], -0.25), 2) }}</td>
                                                    <td>{{ number_format(pow($row['layanan_pelanggan'], 0.15), 2) }}</td>
                                                    <td>{{ number_format(pow($row['ulasan_pelanggan'], 0.2), 2) }}</td>
                                                    <td>{{ number_format(pow($row['fleksibilitas_pembayaran'], 0.15), 2) }}
                                                    </td>

                                                    <td>{{ number_format($rowTotal, 2) }}
                                                    </td> <!-- Tampilkan total untuk baris ini -->
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7" class="text-end"><strong>Total Semua:</strong></td>
                                                <td><strong>{{ number_format($grandTotal, 2) }}</strong></td>
                                                <!-- Tampilkan total keseluruhan -->
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="hk-sec-wrapper mt-4">
                    <h5 class="hk-sec-title">Tabel Total Vektor V</h5>
                    <p class="mb-40">D. Menghitung Nilai Vektor V</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Reseller</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $grandTotal = 0;

                                                // Hitung total keseluruhan
                                                foreach ($ranking as $row) {
                                                    $grandTotal +=
                                                        pow($row['kualitas_produk'], 0.25) *
                                                        pow($row['harga_produk'], -0.25) *
                                                        pow($row['layanan_pelanggan'], 0.15) *
                                                        pow($row['ulasan_pelanggan'], 0.2) *
                                                        pow($row['fleksibilitas_pembayaran'], 0.15);
                                                }

                                                // Hitung nilai per user sebelum diurutkan
                                                $rankingData = [];
                                                foreach ($ranking as $row) {
                                                    $rowTotal =
                                                        pow($row['kualitas_produk'], 0.25) *
                                                        pow($row['harga_produk'], -0.25) *
                                                        pow($row['layanan_pelanggan'], 0.15) *
                                                        pow($row['ulasan_pelanggan'], 0.2) *
                                                        pow($row['fleksibilitas_pembayaran'], 0.15);

                                                    $finalValue = $grandTotal > 0 ? $rowTotal / $grandTotal : 0;

                                                    $rankingData[] = [
                                                        'id_user' => $row['id_user'],
                                                        'finalValue' => $finalValue,
                                                    ];
                                                }

                                                // Urutkan berdasarkan nilai tertinggi (descending)
                                                usort($rankingData, function ($a, $b) {
                                                    return $b['finalValue'] <=> $a['finalValue'];
                                                });
                                            @endphp

                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($rankingData as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $users[$row['id_user']] ?? 'Tidak Diketahui' }}</td>
                                                    <td>{{ number_format($row['finalValue'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->
@endsection
