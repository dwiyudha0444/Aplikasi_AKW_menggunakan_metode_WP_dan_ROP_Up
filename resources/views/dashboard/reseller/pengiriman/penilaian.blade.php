@extends('dashboard.reseller.layout.index')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-sm p-4" style="width: 600px;">
            <h2 class="mb-4 text-center">Penilaian Produk</h2>
            <form action="{{ route('penilaian.store', $id) }}" method="POST">
                @csrf
                <input type="hidden" name="id_pemesanan" value="{{ $id }}">

                <!-- Penilaian Kualitas Produk -->
                <div class="mb-4">
                    <label class="form-label">Kualitas Produk</label>
                    <div class="radio-group flex flex-wrap gap-2">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="flex items-center">
                                <input type="radio" name="kualitas_produk" id="kualitas_produk_{{ $i }}"
                                    value="{{ $i }}" class="radio-input" required>
                                <label for="kualitas_produk_{{ $i }}"
                                    class="radio-label ml-2">{{ $i }}</label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Penilaian Harga Produk -->
                <div class="mb-4">
                    <label class="form-label">Harga Produk</label>
                    <div class="radio-group flex flex-wrap gap-2">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="flex items-center">
                                <input type="radio" name="harga_produk" id="harga_produk_{{ $i }}"
                                    value="{{ $i }}" class="radio-input" required>
                                <label for="harga_produk_{{ $i }}"
                                    class="radio-label ml-2">{{ $i }}</label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Penilaian Layanan Pelanggan -->
                <div class="mb-4">
                    <label class="form-label">Layanan Pelanggan</label>
                    <div class="radio-group flex flex-wrap gap-2">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="flex items-center">
                                <input type="radio" name="layanan_pelanggan" id="layanan_pelanggan_{{ $i }}"
                                    value="{{ $i }}" class="radio-input" required>
                                <label for="layanan_pelanggan_{{ $i }}"
                                    class="radio-label ml-2">{{ $i }}</label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Penilaian Ulasan Pelanggan -->
                <div class="mb-4">
                    <label class="form-label">Ulasan Pelanggan</label>
                    <div class="radio-group flex flex-wrap gap-2">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="flex items-center">
                                <input type="radio" name="ulasan_pelanggan" id="ulasan_pelanggan_{{ $i }}"
                                    value="{{ $i }}" class="radio-input" required>
                                <label for="ulasan_pelanggan_{{ $i }}"
                                    class="radio-label ml-2">{{ $i }}</label>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Penilaian Fleksibilitas Pembayaran -->
                <div class="mb-4">
                    <label class="form-label">Fleksibilitas Pembayaran</label>
                    <div class="radio-group">
                        @for ($i = 1; $i <= 3; $i++)
                            <input type="radio" name="fleksibilitas_pembayaran"
                                id="fleksibilitas_pembayaran_{{ $i }}" value="{{ $i }}"
                                class="radio-input" required>
                            <label for="fleksibilitas_pembayaran_{{ $i }}"
                                class="radio-label">{{ $i }}</label>
                        @endfor
                    </div>
                </div>

                <!-- Komentar -->
                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea name="komentar" id="komentar" rows="4" class="form-control" placeholder="Tulis komentar Anda..."
                        required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Kirim Penilaian</button>
            </form>

        </div>
    </div>

    <style>
        .radio-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .radio-input {
            display: none;
        }

        .radio-label {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            background-color: #f9f9f9;
            border: 2px solid #ddd;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1 0 9%;
        }

        .radio-label:hover {
            background-color: #f0f0f0;
            border-color: #aaa;
        }

        .radio-input:checked+.radio-label {
            background-color: #007bff;
            color: #fff;
            border-color: #0056b3;
        }
    </style>
@endsection
