<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">
</head>

<body>
    <div id="single-wrapper">
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
        <form action="{{ route('login_proses') }}" method="POST" class="frm-single">
            @csrf
            <div class="inside">
                <div class="title"><strong>Azzahra</strong> Kids Wear</div>
                <div class="frm-title">Login</div>

                <div class="frm-input">
                    <input type="email" name="email" placeholder="Email" class="frm-inp"
                        value="{{ old('email') }}">
                    <i class="fa fa-user frm-ico"></i>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="frm-input">
                    <input type="password" name="password" placeholder="Password" class="frm-inp">
                    <i class="fa fa-lock frm-ico"></i>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>

                <a href="{{ route('register') }}" class="a-link"><i class="fa fa-key"></i>Belum Punya Akun?
                    Register.</a>
                <div class="frm-footer">Azzahra Kids Wear © 2016.</div>
            </div>
        </form>
    </div>
</body>

</html>