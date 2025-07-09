<style>
    .navbar-nav .nav-item:last-child {
        margin-left: 20px;
    }

    .navbar-nav {
        margin: 0;
        padding: 0;
    }

    .navbar-nav .nav-item {
        margin: 0 10px;
    }

    .navbar-nav .nav-link {
        padding: 10px 15px;
    }

    .navbar-nav .nav-item .dark_btn {
        margin-left: auto;
    }

    .navbar-nav .nav-item .dark_btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
    }

    .navbar-nav .nav-item .dark_btn:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .navbar-expand-lg .navbar-nav .nav-link.dark_btn {
        color: var(--text-white);
        background-image: var(#5D87FF);
        font-size: 15px;
        padding: 9px 38px;
        border-radius: 25px;
        margin-left: 20px;
        position: relative;
        overflow: hidden;
        transition: 0.4s all;
        font-weight: 700;
    }

    .nav-item.active .nav-link {
        color: #007bff !important;
    }

</style>


<!-- Header Start -->
<header class="fixed">
    <!-- container start -->
    <div class="container">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <div class="toggle-wrap">
                        <span class="toggle-bar"></span>
                    </div>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{ request()->routeIs('beranda') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about-us') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item {{ request()->routeIS('news') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('news') }}">Berita</a>
                    </li>
                    <li class="nav-item {{ request()->routeIS('contact-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact-us') }}">Kontak</a>
                    </li>
                    {{-- <li class="nav-item has_dropdown {{ request()->routeIs('testimoni') || request()->routeIs('news') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Lainnya</a>
                        <span class="drp_btn"><i class="icofont-rounded-down"></i></span>
                        <div class="sub_menu">
                            <ul>
                                <li><a href="javascript:void(0)">Dokumentasi</a></li>
                                <li><a href="{{ route('testimoni') }}">Testimonial</a></li>
                                <li><a href="{{ route('news') }}">Berita</a></li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link dark_btn" href="/login">Masuk<i class="icofont-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navigation end -->
    </div>
    <!-- container end -->
</header>
