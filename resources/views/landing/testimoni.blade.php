@extends('layouts.landing.layouts.app')

@section('style')
<style>
    .company_logos .logo img {
        display: block;
        margin: 0 auto;
        width: 100%;
        transition: transform 0.3s ease-in-out;
        filter: none;
        opacity: 1;
        max-width: 150px;
    }

    .what_coustomer_says .coustomer_slide_box .avtar_profil {
        margin-top: 0px;
    }

</style>
@endsection

@section('banner')
<!-- Bread Crumb -->
<div class="bread_crumb" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">

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

    <div class="container">
        <div class="bred_text">
            <h1 class="text-primary">Testimonial</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><span>»</span></li>
                <li><a href="/">Testimonial</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Trusted Section start -->
<section class="row_am trusted_section">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <h2>Mitra Mischool</h2>
            <p>Daftar - daftar sekolah yang telah bekerja sama dan menggunakan Mischool untuk management sekolah</p>
        </div>
        <!-- logos slider start -->
        <div class="company_logos" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <div id="company_slider" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <!-- logos slider end -->
    </div>
    <!-- container end -->
</section>
<!-- Trusted Section ends -->

<!-- What Our Coustomer Section Start-->
<section class="what_coustomer_says" style="padding-bottom: 200px;">
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
            <h2>Apa yang dikatakan mereka</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus <br> orem Ipsum has beenthe
                standard dummy text ever since.</p>
        </div>
        <div id="coustomer_slider_white" class="owl-carousel owl-theme" data-aos="fade-in" data-aos-duration="1500">
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_01.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Shayna john</h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_02.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Mark </h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Simply dummy text of the print ing and typese tting us orem Ipsum has been lorem Ipsum.</p>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_01.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Willium Joe</h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_03.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Shayna john</h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                </div>
            </div>
        </div>
        <div class="review_summery">
            <div class="rating">
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
            </div>
            <p><span>5.0 / 5.0 -</span> <a href="testimonial.html">3689 Total User Reviews <i class="icofont-arrow-right"></i></a></p>
        </div>
    </div>
</section>
<!-- What Our Coustomer Section End-->

@endsection
