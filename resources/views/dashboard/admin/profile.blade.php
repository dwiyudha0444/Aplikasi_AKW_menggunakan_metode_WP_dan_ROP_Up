@extends('dashboard.admin.index')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="current_password">Password Lama</label>
                                <input type="password" class="form-control" id="current_password" name="current_password"
                                    required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="password">Password Baru (Opsional)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>


                            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
