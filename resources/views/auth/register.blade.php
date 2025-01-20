<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">
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
        <form action="{{ route('register') }}" method="POST" class="frm-single">
            @csrf
            <div class="inside">
                <div class="title"><strong>Ninja</strong>Admin</div>
                <div class="frm-title">Register</div>

                <div class="frm-input">
                    <input type="email" name="email" placeholder="Email" class="frm-inp"
                        value="{{ old('email') }}">
                    <i class="fa fa-envelope frm-ico"></i>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="frm-input">
                    <input type="text" name="name" placeholder="Username" class="frm-inp"
                        value="{{ old('name') }}">
                    <i class="fa fa-user frm-ico"></i>
                    @error('name')
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

                <div class="frm-input">
                    <select name="role" class="frm-inp">
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="kurir" {{ old('role') == 'kurir' ? 'selected' : '' }}>Kurir</option>
                        <option value="reseller" {{ old('role') == 'reseller' ? 'selected' : '' }}>Reseller</option>
                        <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Owner</option>
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>




                <button type="submit" class="frm-submit">Register<i class="fa fa-arrow-circle-right"></i></button>

                <a href="{{ route('login') }}" class="a-link"><i class="fa fa-sign-in"></i>Already have account?
                    Login.</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>
</body>

</html>
