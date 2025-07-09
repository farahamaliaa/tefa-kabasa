@extends('layouts.landing.layouts.app')
@section('banner')
    <div class="bread_crumb" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">

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
                <h1>Detail Berita</h1>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><span>»</span></li>
                    <li>Detail Berita</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="service_detail_section" style="margin-bottom: 200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Service Left Side -->
                    <div class="service_left_side">
                        <div class="section_title" data-aos="fade-up" data-aos-duration="2000">
                            <p style="font-size: 22px">{{ $news['date'] }}</p>
                            <h2>{{ $news['title'] }}</h2>
                        </div>
                        <div class="img" data-aos="fade-up" data-aos-duration="2000">
                            <img src="{{ $news['image'] }}" alt="image">
                        </div>
                        {!! $news['description'] !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Service Right Side -->
                    <div class="service_right_side">
                        <div class="service_list_panel" data-aos="fade-up" data-aos-duration="1500">
                            <h3>Kategori</h3>
                            <ul class="service_list">
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="side_contact_block" data-aos="fade-up" data-aos-duration="1500">
                            <div class="icon"><i class="icofont-live-support"></i></div>
                            <h3>Mari kita bekerja sama</h3>
                            <a href="#" class="btn btn_main">Kontak Kami <i
                                    class="icofont-arrow-right"></i></a>
                            <p><a href="https://wa.me/6285176777785"><i class="icofont-phone-circle"></i>+62 851 7677 7785</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
