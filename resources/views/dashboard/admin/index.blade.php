@include('dashboard.admin.head')

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        @include('dashboard.admin.navbar')

        <!-- Setting Panel -->
        <div class="hk-settings-panel">
            <div class="nicescroll-bar position-relative">
                <div class="settings-panel-wrap">
                    <div class="settings-panel-head">
                        <img class="brand-img d-inline-block align-top" src="dist/img/logo-light.png" alt="brand" />
                        <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span
                                class="feather-icon"><i data-feather="x"></i></span></a>
                    </div>
                    <hr>
                    <h6 class="mb-5">Layout</h6>
                    <p class="font-14">Choose your preferred layout</p>
                    <div class="layout-img-wrap">
                        <div class="row">
                            <a href="javascript:void(0);" class="col-6 mb-30 active">
                                <img class="rounded opacity-70" src="dist/img/layout1.png" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                            <a href="dashboard2.html" class="col-6 mb-30">
                                <img class="rounded opacity-70" src="dist/img/layout2.png" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                            <a href="dashboard3.html" class="col-6 mb-30">
                                <img class="rounded opacity-70" src="dist/img/layout3.png" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                            <a href="dashboard4.html" class="col-6 mb-30">
                                <img class="rounded opacity-70" src="dist/img/layout4.png" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                            <a href="dashboard5.html" class="col-6">
                                <img class="rounded opacity-70" src="dist/img/layout5.png" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <h6 class="mb-5">Navigation</h6>
                    <p class="font-14">Menu comes in two modes: dark & light</p>
                    <div class="button-list hk-nav-select mb-10">
                        <button type="button" id="nav_light_select"
                            class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span
                                class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light
                                Mode</span></button>
                        <button type="button" id="nav_dark_select"
                            class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i
                                    class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <h6 class="mb-5">Top Nav</h6>
                    <p class="font-14">Choose your liked color mode</p>
                    <div class="button-list hk-navbar-select mb-10">
                        <button type="button" id="navtop_light_select"
                            class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i
                                    class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="navtop_dark_select"
                            class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span
                                class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark
                                Mode</span></button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Scrollable Header</h6>
                        <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch">
                        </div>
                    </div>
                    <button id="reset_settings" class="btn btn-primary btn-block btn-reset mt-30">Reset</button>
                </div>
            </div>
            <img class="d-none" src="dist/img/logo-light.png" alt="brand" />
            <img class="d-none" src="dist/img/logo-dark.png" alt="brand" />
        </div>
        <!-- /Setting Panel -->
        <div class="hk-pg-wrapper">
            @yield('content')
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Pampered by<a href="https://hencework.com/" class="text-dark"
                                    target="_blank">Hencework</a> ©
                                2019</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
                            <a href="#"
                                class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                    class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#"
                                class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                    class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#"
                                class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                                    class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
    </div>
    <!-- /HK Wrapper -->
    <!-- jQuery -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap JS (opsional, jika menggunakan Bootstrap styling) -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('dist/js/toggle-data.js') }}"></script>

    <!-- Counter Animation JavaScript -->
    <script src="{{ asset('vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{ asset('vendors/echarts/dist/echarts-en.min.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- Vector Maps JavaScript -->
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/vectormap-data.js') }}"></script>

    <!-- Owl JavaScript -->
    <script src="{{ asset('vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/dashboard-data.js') }}"></script>

</body>

</html>
