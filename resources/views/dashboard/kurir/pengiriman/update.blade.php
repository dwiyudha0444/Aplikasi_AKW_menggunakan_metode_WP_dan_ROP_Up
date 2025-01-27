@extends('dashboard.admin.index')

@section('content')
    <div class="container">
        <h2>Update Status Pengiriman</h2>
        
        <!-- Form untuk memilih status pengiriman -->
        <form action="{{ route('update_pengiriman_produk', $pengiriman->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Jika menggunakan PUT atau PATCH untuk update -->
            
            <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select name="status_pengiriman" id="status_pengiriman" class="form-control">
                    <option value="Dikemas" {{ old('status_pengiriman') == 'Dikemas' ? 'selected' : '' }}>Dikemas</option>
                    <option value="Dikirim" {{ old('status_pengiriman') == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="Selesai" {{ old('status_pengiriman') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
@endsection
