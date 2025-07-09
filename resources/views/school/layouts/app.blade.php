<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>MiSchool | School</title>
    {{-- <title>{{ env('APP_NAME') }} | School</title> --}}
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo/logo-M.png') }}" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    {{-- <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/select2/dist/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/select2/dist/css/select2.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logo/logo-M.png') }}" style="width:100px" alt="loader" class="lds-ripple" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logo/logo-M.png') }}" style="width:100px" alt="loader" class="lds-ripple" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('school.layouts.sidebar')
        <!--  Sidebar End -->
        <!-- SignIn modal content -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('school.layouts.header')
            <!--  Header End -->
            <div class="px-4" style="padding-top: calc(70px + 15px);">
                <!--  Owl carousel -->
                @yield('content')
            </div>
        </div>
    </div>

    <!--  Customizer -->

    <!--  Customizer -->
    <!--  Import Js Files -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    {{-- <script src="{{ asset('admin_assets/dist/libs/jquery/dist/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('admin_assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('admin_assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src="{{ asset('admin_assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('admin_assets/dist/js/dashboard.js') }}"></script> --}}

    <script src="{{ asset('admin_assets/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/forms/select2.init.js') }}"></script>

    <script src="{{ asset('admin_assets/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/plugins/repeater-init.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/forms/sweet-alert.init.js') }}"></script>


    @yield('script')
</body>

</html>
