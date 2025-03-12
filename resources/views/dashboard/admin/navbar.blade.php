        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
                    class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="dashboard1.html">
    <span class="brand-text font-weight-bold">AZZAHRA</span>
</a>

            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            {{-- <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="dist/img/avatar12.jpg" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div> --}}
                            <div class="media-body d-flex align-items-center">
                                <span class="d-inline-flex">{{ auth()->user()->name }} <i
                                        class="zmdi zmdi-chevron-down"></i></span>
                            </div>


                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span>
                        </a>

                        {{-- <div class="dropdown-divider"></div> --}}
                        {{-- <div class="sub-dropdown-menu show-on-hover">
                            <a href="#" class="dropdown-toggle dropdown-item no-caret"><i
                                    class="zmdi zmdi-check text-success"></i>Online</a>
                            <div class="dropdown-menu open-left-side">
                                <a class="dropdown-item" href="#"><i
                                        class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
                                <a class="dropdown-item" href="#"><i
                                        class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
                                <a class="dropdown-item" href="#"><i
                                        class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
                            </div>
                        </div> --}}

                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                            <button type="submit" class="dropdown-item" style="border: none; background: transparent;">
                                <i class="dropdown-icon zmdi zmdi-power"></i>
                                <span>Log out</span>
                            </button>
                        </form>

                    </div>
                </li>
            </ul>
        </nav>

        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">

                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard_admin')}}">
                                    <span class="feather-icon"><i data-feather="activity"></i></span>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#app_drp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
                                    <span class="nav-link-text">Aplikasi</span>
                                </a>
                                <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin_produk') }}">Produk</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin_stok') }}">Stok
                                                    Produk</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin_ukuran') }}">Ukuran
                                                    Produk</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin_kategori') }}">Kategori</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pemesanan.index') }}">Riwayat
                                                    Pemesanan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pemesanan_produk.index') }}">Detail
                                                    Pemesanan
                                                    Produk</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#diskon_drp">
                                    <span class="feather-icon"><i data-feather="zap"></i></span>
                                    <span class="nav-link-text">Diskon</span>
                                </a>
                                <ul id="diskon_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin_diskon') }}">Daftar
                                                    Diskon</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#akun_drp">
                                    <span class="feather-icon"><i data-feather="user"></i></span>
                                    <span class="nav-link-text">Akun</span>
                                </a>
                                <ul id="akun_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin_daftarakun') }}">Daftar
                                                    Akun</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        {{-- kurir --}}

                        @if (Auth::check() && Auth::user()->role === 'kurir')
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('dashboard_kurir')}}">
                                    <span class="feather-icon"><i data-feather="activity"></i></span>
                                    <span class="nav-link-text">Dashboard Kurir</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#app_drp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
                                    <span class="nav-link-text">Pengiriman</span>
                                </a>
                                <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('dashboard_kurir_pengiriman') }}">Paket</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::check() && Auth::user()->role === 'owner')
                            <li class="nav-item active">
                                <a class="nav-link" href="dashboard1.html">
                                    <span class="feather-icon"><i data-feather="activity"></i></span>
                                    <span class="nav-link-text">Dashboard Owner</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#penjualan_drp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
                                    <span class="nav-link-text">Penjualan</span>
                                </a>
                                <ul id="penjualan_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('owner_penjualan') }}">Penjualan</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#penilaian_drp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
                                    <span class="nav-link-text">Penilaian</span>
                                </a>
                                <ul id="penilaian_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('owner_penilaian') }}">Penilaian</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#auth_drp">
                                    <span class="feather-icon"><i data-feather="zap"></i></span>
                                    <span class="nav-link-text">Daftar Reseller</span>
                                </a>
                                <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('owner_daftarreseller') }}">Daftar
                                                    Reseller Terbaik</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
