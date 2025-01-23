@include('dashboard.reseller.layout.head')

@include('dashboard.reseller.layout.navbar')

@include('dashboard.reseller.layout.header')

       <section class="pb-5">
            @yield('content')
        </section>

@include('dashboard.reseller.layout.footer')