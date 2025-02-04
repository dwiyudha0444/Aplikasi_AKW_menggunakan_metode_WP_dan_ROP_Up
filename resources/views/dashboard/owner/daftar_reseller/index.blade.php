@foreach(getAllPenilaian() as $penilaian)
    <p>{{ $penilaian->id_pemesanan }} - Skor: {{ $penilaian->id_pemesanan_produk }}</p>
@endforeach
