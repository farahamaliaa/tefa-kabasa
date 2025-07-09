<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/codely/all-demo/06-codely-landing-page-get-started-hero/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 02:06:20 GMT -->
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiSchool</title>

    <!-- icofont-css-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/icofont.min.css') }}">
    <!-- Owl-Carosal-Style-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/animate.min.css') }}">
    <!-- Owl-Carosal-Style-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/owl.carousel.min.css') }}">
    <!-- Bootstrap-Style-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/bootstrap.min.css') }}">
    <!-- Aos-Style-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/aos.css') }}">
    <!-- Coustome-Style-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/style.css') }}">
    <!-- Responsive-Style-link -->
    <link rel="stylesheet" href="{{ asset('landing_assets/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-M.png') }}" type="image/x-icon">

    @yield('style')
</head>

<body>

    <!-- Page-wrapper-Start -->
    <div class="page_wrapper">

        <!-- Preloader -->
        <div id="preloader">
            <!-- <div id="loader"></div> -->
            <div class="circle-border">
                <div class="circle-core"></div>
            </div>
        </div>

        <!-- Top Banner Start-->
        <div class="top_home_wraper white_option">

            <div class="container">
                <!-- vertical line animation -->
                <div class="anim_line dark_bg">
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                </div>
            </div>

            <!-- Header Start -->
            @include('layouts.landing.header')

            <!-- Banner-Section-Start -->
            @include('layouts.landing.banner')
        </div>
        <!-- Top Banner End-->

        @yield('content')

        @include('layouts.landing.footer-landing')

        <!-- VIDEO MODAL -->
        <div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button id="close-video" type="button" class="button btn btn-default text-right" data-dismiss="modal">
                        <i class="icofont-close-line-circled"></i>
                    </button>
                    <div class="modal-body">
                        <div id="video-container" class="video-container">
                            <iframe id="youtubevideo" width="640" height="360" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Page-wrapper-End -->

    <!-- Jquery-js-Link -->
    <script src="{{ asset('landing_assets/js/jquery.js') }}"></script>
    <!-- owl-js-Link -->
    <script src="{{ asset('landing_assets/js/owl.carousel.min.js') }}"></script>
    <!-- bootstrap-js-Link -->
    <script src="{{ asset('landing_assets/js/bootstrap.min.js') }}"></script>
    <!-- aos-js-Link -->
    <script src="{{ asset('landing_assets/js/aos.js') }}"></script>
    <!-- main-js-Link -->
    <script src="{{ asset('landing_assets/js/main.js') }}"></script>
    @yield('script')

</body>


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/codely/all-demo/06-codely-landing-page-get-started-hero/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 02:07:38 GMT -->
</html>
