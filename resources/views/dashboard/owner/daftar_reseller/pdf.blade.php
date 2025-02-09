<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penilaian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
        }

        .header p {
            font-size: 12px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 10px;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Penilaian Reseller</h1>
        <p>Tanggal: {{ date('d-m-Y') }}</p>
    </div>

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
                                            <td>0,25</td>
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
                                                <th>Nama Produk</th>
                                                <th>Kualitas Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Layanan Pelanggan</th>
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
                                                    <td>{{ $row['id_user'] }}</td>
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
                                                        pow($row['kualitas_produk'], 0.25) +
                                                        pow($row['harga_produk'], -0.25) +
                                                        pow($row['layanan_pelanggan'], 0.15) +
                                                        pow($row['ulasan_pelanggan'], 0.2) +
                                                        pow($row['fleksibilitas_pembayaran'], 0.25);

                                                    // Tambahkan ke grand total
                                                    $grandTotal += $rowTotal;
                                                @endphp
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row['id_user'] }}</td>
                                                    <td>{{ pow($row['kualitas_produk'], 0.25) }}</td>
                                                    <td>{{ pow($row['harga_produk'], 0.25) }}</td>
                                                    <td>{{ pow($row['layanan_pelanggan'], 0.25) }}</td>
                                                    <td>{{ pow($row['ulasan_pelanggan'], 0.25) }}</td>
                                                    <td>{{ pow($row['fleksibilitas_pembayaran'], 0.25) }}</td>
                                                    <td>{{ $rowTotal }}</td> <!-- Tampilkan total untuk baris ini -->
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7" class="text-end"><strong>Total Semua:</strong></td>
                                                <td><strong>{{ $grandTotal }}</strong></td>
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
                                                $no = 1; // Inisialisasi nomor urut
                                                $grandTotal = 0; // Total keseluruhan
                                            @endphp
                                            @foreach ($ranking as $row)
                                                @php
                                                    // Hitung total untuk setiap id_user
                                                    $rowTotal =
                                                        pow($row['kualitas_produk'], 0.25) +
                                                        pow($row['harga_produk'], 0.25) +
                                                        pow($row['layanan_pelanggan'], 0.25) +
                                                        pow($row['ulasan_pelanggan'], 0.25) +
                                                        pow($row['fleksibilitas_pembayaran'], 0.25);

                                                    // Tambahkan ke grand total
                                                    $grandTotal += $rowTotal;
                                                @endphp
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row['id_user'] }}</td>
                                                    <td>{{ $rowTotal / $grandTotal }}</td>
                                                    <!-- Total nilai untuk user ini -->
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    <div class="footer">
        <p>Laporan ini dibuat secara otomatis oleh sistem pada {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
