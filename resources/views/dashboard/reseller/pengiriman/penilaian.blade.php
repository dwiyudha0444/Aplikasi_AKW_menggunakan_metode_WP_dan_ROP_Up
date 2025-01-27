@extends('dashboard.reseller.layout.index')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 500px;">
        <h2 class="mb-4 text-center">Penilaian Produk</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <select name="harga" id="harga" class="form-select" required>
                    <option value="">Pilih Penilaian</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="kualitas" class="form-label">Kualitas</label>
                <select name="kualitas" id="kualitas" class="form-select" required>
                    <option value="">Pilih Penilaian</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="pelayanan" class="form-label">Pelayanan</label>
                <select name="pelayanan" id="pelayanan" class="form-select" required>
                    <option value="">Pilih Penilaian</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="pengemasan" class="form-label">Pengemasan</label>
                <select name="pengemasan" id="pengemasan" class="form-select" required>
                    <option value="">Pilih Penilaian</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="kecepatan_pengiriman" class="form-label">Kecepatan Pengiriman</label>
                <select name="kecepatan_pengiriman" id="kecepatan_pengiriman" class="form-select" required>
                    <option value="">Pilih Penilaian</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="komentar" class="form-label">Komentar</label>
                <textarea name="komentar" id="komentar" rows="4" class="form-control" placeholder="Tulis komentar Anda..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Kirim Penilaian</button>
        </form>
    </div>
</div>
@endsection
