@extends('layouts.landing.layouts.app')
@section('style')
    <style>
        .sl_two_colom_image {
            margin-bottom: 50px;
            margin-right: 100px;
        }
    </style>
@endsection
@section('banner')
    <!-- Bread Crumb -->
    <div class="bread_crumb" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">

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


            <div class="bred_text">
                <h1 style="color: #5D87FF">Tentang Kami</h1>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><span>»</span></li>
                    <li><a href="/about-us">Tentang kami</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="about_us_page_section">
        <div class="dotes_anim_bloack">
            <div class="dots dotes_1"></div>
            <div class="dots dotes_2"></div>
            <div class="dots dotes_3"></div>
            <div class="dots dotes_4"></div>
            <div class="dots dotes_5"></div>
            <div class="dots dotes_6"></div>
            <div class="dots dotes_7"></div>
            <div class="dots dotes_8"></div>
        </div>
        <div class="container">
            <div class="about_block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section_title" data-aos="fade-in" data-aos-duration="1500">
                            <h1 class="text-primary">Tentang Mischool</h1>
                            <p>Mischool adalah website manajemen sekolah yang dirancang untuk memudahkan pengelolaan sekolah. Website ini dilengkapi dengan fitur-fitur seperti absensi, jurnal mengajar, jurnal staff, pelanggaran dan perbaikan, tanggapan siswa, serta buku tamu.</p>
                            <p>Terdapat empat peran pengguna di dalam mischool, yaitu admin sekolah, guru, staf dan siswa. Pada setiap peran memiliki fitur dan hak akses yang berbeda-beda.</p>
                        </div>
                    </div>
                    <!-- image -->
                    <div class="col-md-6">
                        <div class="sl_two_colom_image" data-aos="fade-in" data-aos-duration="1000">
                            <img src="{{ asset('landing_assets/images/landing/about-2.png') }}" alt="image"
                                style="height: 587px">
                        </div>
                    </div>
                </div>
            </div>
            <div id="counter">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="counter_outer" data-aos="fade-up" data-aos-duration="1500">
                            <div class="counter_box">
                                <p><span class="counter-value" data-count="4">0</span><span>+</span></p>
                                <p style="font-size: 20px">Sekolah</p>
                                <p style="font-size: 14px">Beberapa sekolah telah bergabung dengan MiSchool, memanfaatkan platform kami untuk memanajemen informasi dan data sekolah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="counter_outer" data-aos="fade-up" data-aos-duration="1500">
                            <div class="counter_box">
                                <p><span class="counter-value" data-count="98">0</span><span>+</span></p>
                                <p style="font-size: 20px">Guru</p>
                                <p style="font-size: 14px">Dengan lebih dari 98 guru yang aktif menggunakan MiSchool, platform kami membantu mempermudah proses presensi siswa di setiap kelas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="counter_outer" data-aos="fade-up" data-aos-duration="1500">
                            <div class="counter_box">
                                <p><span class="counter-value" data-count="1021">0</span><span>+</span></p>
                                <p style="font-size: 20px">Siswa</p>
                                <p style="font-size: 14px">MiSchool mendukung lebih dari 1021 siswa di seluruh sekolah yang bekerja sama, memberikan kebebasan kepada siswa untuk memberikan tanggapan kepada guru.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row_am service_list_two_colom">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="sl_two_colom_image" data-aos="fade-in" data-aos-duration="1000">
                        <img src="{{ asset('landing_assets/images/landing/about-3.png') }}" alt="image">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="sl_two_colom_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                        <div class="section_title">
                            <h2>Kenapa Memilih Mischool </h2>
                            <p>Berikut beberapa alasan anda memilih Mischool untuk mengelola sekolah Anda.</p>
                        </div>

                        <div class="service_list_point">
                            <ul data-aos="fade-up" data-aos-duration="2000">
                                <li> <i class="icofont-check-circled" style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Kemudahan Pengelolaan </li>
                                <li> <i class="icofont-check-circled" style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Memiliki banyak peran pengguna</li>
                                <li> <i class="icofont-check-circled" style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Fitur yang sangat berguna untuk sekolah</li>
                                <li> <i class="icofont-check-circled" style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Dapat digunakan oleh semua jenjang sekolah</li>
                                <li> <i class="icofont-check-circled" style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Absensi yang lebih efektif dan efisien</li>
                                <li> <i class="icofont-check-circled" style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Rekap data yang jelas</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
