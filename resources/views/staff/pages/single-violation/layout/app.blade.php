<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>MiSchool | Staff</title>
    <!--  Required Meta Tag -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Modernize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Modernize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('mobilelogo.png') }}" />

    <!-- Core CSS -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @yield('style')

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logo/logo-M.png') }}" style="width:100px" alt="loader" class="lds-ripple" />
    </div>

    <!-- Header -->
    <header class="app-header">

    </header>

    <div class="background-half">
        <div class="content-half p-5">
            @yield('content')
        </div>
    </div>

    <!--  Import Js Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('admin_assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/custom.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/plugins/repeater-init.js') }}"></script>
    @yield('script')

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
