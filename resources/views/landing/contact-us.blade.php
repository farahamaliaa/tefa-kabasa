@extends('layouts.landing.layouts.app')

@section('style')
<style>
    .contact_list_section .contact_list_inner .icons .dot_anim {
        background-color: #007bff;
    }

    .contact_list_section .contact_list_inner .c_list_card:nth-child(1) .dot_anim {
        background-color: #007bff;
    }

    .contact_list_section .contact_list_inner .c_list_card:nth-child(3) .dot_anim {
        background-color: #007bff;
    }


    .btn_main {
        background: linear-gradient(45deg, #79C7FF, #0042FF);
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn_main:hover {
        background: linear-gradient(45deg, #0042FF, #79C7FF);
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
            <h1 class="text-primary">Hubungi Kami</h1>
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><span>»</span></li>
                <li><a href="/contact-us">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- contact list Start -->
<section class="row_am contact_list_section">
    <div class="container">

        <div class="contact_list_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
            <!-- card -->
            <div class="c_list_card">
                <div class="icons">
                    <img src="{{ asset('landing_assets/images/new/contact-us/mail.png') }}" width="106px" alt="image">
                    <div class="dot_block">
                        <span class="dot_anim"></span>
                        <span class="dot_anim"></span>
                        <span class="dot_anim"></span>
                    </div>
                </div>
                <div class="inner_text">
                    <h3 class="text-primary">Email</h3>
                    <p>Hubungi kami melalui email untuk dukungan atau info lebih lanjut
                    </p>
                    <a href="mailto:info@hummatech.com" class="text_btn text-primary">info@hummatech.com</a>
                </div>
            </div>
            <!-- card -->
            <div class="c_list_card">
                <div class="icons">
                    <img src="{{ asset('landing_assets/images/new/contact-us/location.png') }}" width="106px" alt="image">
                    <div class="dot_block">
                        <span class="dot_anim"></span>
                        <span class="dot_anim"></span>
                        <span class="dot_anim"></span>
                    </div>
                </div>
                <div class="inner_text">
                    <h3 class="text-primary">Lokasi</h3>
                    <p>Temukan lokasi kami di bagian Lokasi.
                    </p>
                    <a href="https://maps.app.goo.gl/7e2rM6FNLSsX7M379" class="text_btn text-primary">Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152.</a>
                </div>
            </div>
            <!-- card -->
            <div class="c_list_card">
                <div class="icons">
                    <img src="{{ asset('landing_assets/images/new/contact-us/phone.png') }}" width="106px" alt="image">
                    <div class="dot_block">
                        <span class="dot_anim"></span>
                        <span class="dot_anim"></span>
                        <span class="dot_anim"></span>
                    </div>
                </div>
                <div class="inner_text">
                    <h3 class="text-primary">Nomor Telepon</h3>
                    <p>Hubungi kami via telepon untuk dukungan atau pertanyaan.
                    </p>
                    <a href="tel: 085176777785" class="text_btn text-primary">085176777785</a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- contact list End -->

<!-- Contact Us form Start -->
<section class="contact_form_section" style="padding-bottom: 200px;">
    <div class="container">
        <div class="contact_inner">
            <div class="contact_form">
                <div class="section_title">
                    <h2 class="text-primary">Tuliskan Pesanmu</h2>
                    <p>Hubungi kami untuk bantuan, pertanyaan, atau informasi lebih lanjut</p>
                </div>
                <form action="{{ route('store.send.email') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Nama" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" style="height: 250px;" name="description" placeholder="Tuliskan pesanmu disini..."></textarea>
                    </div>

                    <div class="form-group ">
                        <button class="btn btn_main" type="submit">Kirim Pesan <i class="icofont-arrow-right"></i></button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</section>
<!-- Contact Us form End -->
@endsection
