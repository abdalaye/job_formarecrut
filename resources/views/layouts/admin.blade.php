<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} @hasSection ('name') -  @yield('title') @endif </title>

        <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">

        {{-- FANCYBOX --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" integrity="sha256-ygkqlh3CYSUri3LhQxzdcm0n1EQvH2Y+U5S2idbLtxs=" crossorigin="anonymous" />

        <!-- Styles -->
        <link href="{{ asset('css/vendor/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/jquery.auto-complete.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/animate.min.css') }}" rel="stylesheet">

        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/> --}}

        {{-- Reglage CSS ADMIN LTE --}}
        <style>
            .dropdown-toggle::after {color: white}
            .select2-container { width: 100% !important; }
            .text-sm .brand-link .brand-image { margin-left: -0.2rem; }
        </style>
        @yield('customCss')

    </head>
    <body class="hold-transition sidebar-mini-md text-sm layout-navbar-fixed">
        <div class="wrapper" id="wrapper">
            <!-- Navbar -->
            @include('partials.navs.adminNavBarElement')
            <!-- /.navbar -->

            <!-- Control Sidebar -->
            @include('partials.navs.adminSidebarElement')
            <!-- /.control-sidebar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header bg-white px-3 py-2 d-flex justify-content-between align-items-center shadow-sm">
                <h2 class="h6 m-0 text-black-50">@yield('title')</h2>
                <!-- Actions-->
                @yield('actions')
            </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content py-2" style="margin-top: 2px" id="main">
                    <div class="container-fluid py-2 h-100" id="main-content">
                        <div class="d-flex justify-content-center align-items-center" id="loadingDiv">
                            <div class="lds-spinner">
                                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                            </div>
                        </div>
                        <div class="row d-none" id="dynamic-content">
                            @yield('content')
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer shadow-sm border-0 text-right">
                Conditions générales d'utilisation &copy; FormaRecrut - Jobs <img src="{{ asset('img/logo.png') }}" alt="FormaRecrut" class="img-size-64">
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/vendor/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/vendor/select2.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/config-vendor.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
        {{-- <script src="{{ asset('js/vendor/chart.js/Chart.min.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


        {{-- SWEET ALERT --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        {{-- <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
        <script>
            // $('.js-example-basic-multiple').select2();
            if ($("#description").html() !== undefined) {

                CKEDITOR.replace('description', {
                    // uiColor: '#4A96D2'
                });

            }
        </script> --}}
        <script src="{{ asset('js/vendor/toastr.min.js') }}"></script>
        <script>
            @if(session('success'))
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Opération effectuée avec succès',
                    subtitle: '',
                    autohide: true,
                    delay: 6000,
                    icon: 'fas fa-check-circle fa-lg',
                    body: "{!! session('success') !!}"
                });
            @endif

            @if(session('error'))
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Opération échouée',
                    subtitle: '',
                    autohide: true,
                    delay: 6000,
                    icon: 'fas fa-times-circle fa-lg',
                    body: "{!! session('error') !!}"
                });
            @endif
        </script>
        <script src="{{ asset('js/partials/showHidePassword.js') }}"></script>
        <script>
            //Ajax form message
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if ($(".select").html() !== undefined) {
                $('.select').select2();
            }
        </script>
        @yield('partialScript')
        @yield('scriptBottom')
        @yield('scriptFiche')
    </body>
</html>
