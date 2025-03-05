<nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">AKW Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="{{ route('dashboard_reseller') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('history') }}">Pemesanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pengiriman_produk') }}">Pengiriman</a></li>


                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                         <li><a class="dropdown-item" href="{{ route('history') }}">History Transaction</a></li>
                    </ul>
                </li> --}}
            </ul>
            <form class="d-flex">
                <a href="{{ route('cart.index') }}" class="btn btn-outline-dark me-2">
                    <i class="bi-cart-fill me-1"></i> Cart
                </a>

                <form action="{{ route('logout2') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">
                        <i class="bi-box-arrow-right me-1"></i>
                        Logout
                    </button>
                </form>

            </form>

        </div>
    </div>
</nav>
