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

    <style>
        /* Menata header */
        .app-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            background-color: #FFFFFF;
            height: 70px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Tambahkan shadow */
        }

        .header-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.5rem;
            font-weight: bold;
            color: #424242;
        }

        .header-logo {
            width: 150px;
            height: auto;
            margin-left: 20px;
        }

        .header-svg {
            width: 24px;
            height: 24px;
            margin-right: 20px;
        }

        /* Menghilangkan margin body agar header menempel ke atas */
        body {
            margin: 0;
            padding-top: 70px;
            display: flex;
            flex-direction: column;
        }

        /* Gaya untuk setengah layar dengan gambar latar belakang di bagian atas */
        .background-half {
            width: 100%;
            /* Lebar penuh */
            height: 35vh;
            /* Setengah tinggi layar */
            background-image: url('{{ asset('assets/images/background/mischool-bg.png') }}');
            background-size: cover;
            /* Menutup seluruh area dengan gambar */
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            /* Agar konten bisa diposisikan di atas gambar */
        }

        /* Gaya untuk konten yang berada di atas gambar latar belakang */
        .content-half {
            position: absolute;
            padding: 40px;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logo/logo-M.png') }}" style="width:100px" alt="loader" class="lds-ripple" />
    </div>

    <!-- Header -->
    <header class="app-header">
        <!-- Logo di Sebelah Kiri -->
        <a class="navbar-brand p-0 m-0" href="javascript:void(0)">
            <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" alt="Logo"
                class="header-logo d-none d-md-block">
        </a>

        <!-- Judul di Tengah -->
        <div class="header-title">
            @yield('title')
        </div>

        <!-- SVG Icon di Sebelah Kanan -->

        <div>
            <a href="{{ route('employee.dashboard') }}" class="nav-link p-0 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="header-svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        {{-- @include('staff.fulllayouts.header') --}}
    </header>

    <!--  Background Section (Top Half) -->
    <div class="background-half">
        <!-- Konten di atas gambar latar belakang -->
        <div class="content-half">
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
