@extends('layouts.landing.layouts-landing')
@section('style')
    <style>
        .banner_section .banner_text {
            color: var(--text-white);
            text-align: center;
            padding: 250px 100px 0 0;
        }

        .banner_section .banner_text {
            color: var(--text-white);
            text-align: center;
            padding: 120px 50px 50px 50px;
        }

        .btn_main {
            background: linear-gradient(45deg, #79C7FF, #0042FF);
            /* Gradasi biru */
            color: white;
            /* Warna teks putih */
            border: none;
            /* Hilangkan border */
            padding: 10px 20px;
            /* Padding untuk ukuran tombol */
            font-size: 16px;
            /* Ukuran font */
            cursor: pointer;
            /* Ubah cursor menjadi pointer */
            transition: background 0.3s;
            /* Animasi transisi saat hover */
        }

        .btn_main:hover {
            background: linear-gradient(45deg, #0042FF, #79C7FF);
            /* Ubah gradasi saat hover */
        }

        .analyze_section .analyze_image img {
            box-shadow: none;
            max-width: 100%;
            border-radius: none;
        }

        a.btn-stroke-gradient {
            border: 2px solid #5D87FF;
            border-radius: 9px;
            color: #5D87FF;
            transition: 0.3s ease-in-out;
        }

        a.btn-stroke-gradient:hover {
            background: linear-gradient(45deg, #79C7FF, #0042FF);
            color: #fff;
            transition: 0.3s ease-in-out;
        }

        .navbar-expand-lg .navbar-nav .nav-link.dark_btn {
            color: var(--text-white);
            background-image: var(--primary);
        }

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

        .faq_section .faq_panel .card-header .btn.active {
            color: var(--primary);
        }

        .text-primary {
            color: #0042FF;
        }

        .analyze_section .analyze_image {
            background-position: center;
        }

        .analyze_section .analyze_text .section_title {
            text-align: left;
            margin: 15px 0 40px 30px;
        }

        .unique_section .features_inner .icons .dot_anim {
            position: absolute;
            width: 6px;
            height: 6px;
            display: block;
            background-color: #43c8f9;
            border-radius: 10px;
            z-index: 1;
            transition: 0.5s all;
        }

        .unique_section .features_inner .feature_card:nth-child(1) .dot_anim {
            background-color: #43c8f9;
        }

        .unique_section .features_inner .feature_card:nth-child(3) .dot_anim {
            background-color: #43c8f9;
        }


        .story_img img {
            width: 100%;
            height: 200px;
            /* Atur tinggi gambar */
            object-fit: cover;
            /* Pastikan gambar proporsional */
        }

        .story_box {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Pastikan tinggi card seragam */
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .story_text {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            /* Biarkan teks mengisi ruang kosong */
            padding: 15px;
        }

        .story_text1 {
            margin-top: auto;
            /* Dorong tombol ke bawah */
            text-align: center;
            /* Pusatkan tombol secara horizontal (opsional) */
        }
    </style>

    <style>
        @media screen and (max-width: 767px) {
            .analyze_section .section_title h2 {
                padding-left: 0px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Unique features Start -->
    <section class="row_am unique_section">
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <h2>Fitur - Fitur </h2>
                <p>Mischool dilengkapi dengan fitur - fitur penting untuk management sekolah, dibawah ini adalah fitur -
                    fitur dari Mischool</p>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start" style="height: 100%">
                            <img src="{{ asset('landing_assets/images/landing/feature-3.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Absensi</h3>
                            <p>Fitur ini memudahkan rekap kehadiran siswa dan guru saat masuk dan pulang dengan kartu, serta
                                memantau siswa yang bolos, menjadikan pengelolaan kehadiran lebih efektif.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start" style="height: 100%">
                            <img src="{{ asset('landing_assets/images/landing/feature-1.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Jurnal Mengajar</h3>
                            <p>Fitur Jurnal Mengajar memudahkan guru dalam rekap kehadiran siswa di setiap jam pelajaran,
                                sekaligus menjadi penanda kehadiran guru pada hari itu.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start" style="height: 100%">
                            <img src="{{ asset('landing_assets/images/landing/feature-4.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Jurnal Staf</h3>
                            <p>Fitur Jurnal Staff berfungsi untuk mencatat kegiatan yang dilakukan oleh staff setiap
                                harinya, yang nantinya dapat direkap oleh admin sekolah untuk memantau dan meningkatkan
                                kedisiplinan staff.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start" style="height: 100%">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-2.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Pelanggaran & Perbaikan</h3>
                            <p>Dengan adanya fitur ini, staff/guru lebih mudah untuk mencatat pelanggaran dan perbaikan
                                siswa. Sehingga, sekolah dapat memantau dan membantu siswa untuk meningkatkan kedisiplinan
                                mereka di lingkungan sekolah.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start" style="height: 100%">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-5.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Tanggapan Siswa</h3>
                            <p>Siswa dapat memberikan tanggapan langsung tentang kehadiran dan materi yang diajarkan,
                                sehingga proses pembelajaran lebih terpantau oleh sekolah.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start" style="height: 100%">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-6.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Buku Tamu</h3>
                            <p>Fitur ini berfungsi untuk merekap data instansi atau perorangan yang berkunjung ke sekolah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Unique features End -->

    <!-- Analyze Section Strat -->
    <section class="row_am analyze_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <div class="analyze_image d-flex justify-content-center" data-aos="fade-in"
                            data-aos-duration="1000">
                            <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class=""
                                src="{{ asset('landing_assets/images/landing/about.png') }}" width="400px" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center ms-3">
                    <div class="analyze_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                        <div class="section_title align-center">
                            <h2>Tentang Mischool</h2>
                            <p>Mischool adalah website manajemen sekolah yang dirancang untuk memudahkan pengelolaan
                                sekolah. Website ini dilengkapi dengan fitur-fitur seperti absensi, jurnal mengajar, jurnal
                                staff, pelanggaran dan perbaikan, tanggapan siswa, serta buku tamu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Analyze Section End -->

    <!-- Interface overview-Section start -->
    <section class="row_am interface_section mb-5 pb-5">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <h2>Preview Fitur MISCHOOL</h2>
            <p>
                Berikut beberapa preview dari website Mischool, mulai dari halaman untuk sekolah, guru, staff, hingga siswa.
            </p>
        </div>
        <!-- screen slider start -->
        <div class="screen_slider" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
            <div id="screen_slider" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/journal_teacher.jpg') }}"
                            alt="image">
                        <h3 class="caption">Jurnal Mengajar</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/attendance.jpg') }}" alt="image">
                        <h3 class="caption">Absensi</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/student_feedback.jpg') }}"
                            alt="image">
                        <h3 class="caption">Feedback Siswa</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/dashboard_school.jpg') }}"
                            alt="image">
                        <h3 class="caption">Dashboard</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/journal_staf.jpeg') }}"
                            alt="image">
                        <h3 class="caption">Jurnal Staf</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/violation.jpeg') }}"
                            alt="image">
                        <h3 class="caption">Pelanggaran</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/repair.jpeg') }}" alt="image">
                        <h3 class="caption">Perbaikan</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="screen_frame_img">
                        <img src="{{ asset('admin_assets/dist/images/preview_features/guest_book.jpeg') }}"
                            alt="image">
                        <h3 class="caption">Buku Tamu</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- screen slider end -->
    </section>
    <!-- Interface overview-Section end -->

    <!-- Powerful solution for your business Section Start -->
    <section class="powerful_solution" data-aos="fade-in" data-aos-duration="1000">
        <section class="row_am unique_section">
            <div class="container">
                <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                    <!-- h2 -->
                    <h2>Pengguna MISCHOOL</h2>
                    <!-- p -->
                    <p>Mischool hadir sebagai solusi manajemen sekolah yang inovatif, mendukung berbagai aktivitas dan
                        proses dalam lingkungan pendidikan.</p>
                </div>
                <div class="features_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
                    <!-- card -->
                    <div class="feature_card">
                        <div class="icons">
                            <img src="{{ asset('landing_assets/images/new/features_icon_01.svg') }}" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="inner_text">
                            <h3>Sekolah</h3>
                            <p>Pengguna sekolah memiliki akses penuh untuk melihat seluruh rekap jurnal guru dan staff,
                                absensi siswa, serta dapat mengatur berbagai fitur yang disediakan sesuai kebutuhan.</p>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="feature_card">
                        <div class="icons">
                            <img src="{{ asset('landing_assets/images/new/features_icon_01.svg') }}" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="inner_text">
                            <h3>Guru & Staf</h3>
                            <p>Guru dapat dengan mudah merekap kehadiran siswa di setiap mata pelajaran, sementara staf
                                memiliki kemudahan untuk mencatat kegiatan harian mereka, memastikan semua aktivitas terekap
                                dengan baik.</p>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="feature_card">
                        <div class="icons">
                            <img src="{{ asset('landing_assets/images/new/features_icon_01.svg') }}" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="inner_text">
                            <h3>Siswa</h3>
                            <p>Siswa dapat memberikan tanggapan langsung tentang guru yang mengajar pada hari itu, jika
                                fitur ini diaktifkan oleh admin sekolah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Powerful solution for your business Section End -->

    <!-- Trusted Section start -->
    @if ($schools != null)
        @if (count($schools) > 0)
            <section class="row_am trusted_section">
                <!-- container start -->
                <div class="container">
                    <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                        <h2>Mitra Mischool</h2>
                        <p>Daftar - daftar sekolah yang telah bekerja sama dan menggunakan Mischool untuk management sekolah
                        </p>
                    </div>
                    <!-- logos slider start -->
                    <div class="company_logos" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                        <div id="company_slider" class="owl-carousel owl-theme">
                            @forelse ($schools as $school)
                                <div class="item">
                                    <div class="logo">
                                        {{-- <img src="{{ asset('storage/' . $school->logo) }}" alt="image"
                                    style="width: 150px; height: 150px; object-fit: contain;"> --}}
                                        <img src="{{ asset('https://mischool.mijurnal.com/storage/' . $school['logo']) }}"
                                            alt="image" style="max-width: 150px; max-height: 150px;">
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <!-- logos slider end -->
                </div>
            </section>
        @endif
    @endif
    <!-- Trusted Section ends -->

    <!-- What Our Coustomer Section Start-->
    {{-- <section class="what_coustomer_says">
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
                <p><span>5.0 / 5.0 -</span> <a href="testimonial.html">3689 Total User Reviews <i
                            class="icofont-arrow-right"></i></a></p>
            </div>
        </div>
    </section> --}}
    <!-- What Our Coustomer Section End-->

    <!-- Story-Section-Start -->
    {{-- @if ($newses != null) --}}
    @if (count($newses) > 0)
        <section class="row_am latest_story" id="blog">
            <!-- container start -->
            <div class="container">
                <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                    <h2>Berita Terbaru</h2>
                    <p>Berita berita terbaru yang menyediakan tentang informasi kerja sama Mischool antar sekolah</p>
                </div>
                <!-- row start -->
                <div class="row">
                    @forelse ($newses as $news)
                        <div class="col-md-4 d-flex">
                            <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                                <div class="story_img">
                                    <img src="{{ $news['image'] }}" alt="image"
                                        style="height: 200px; object-fit: cover;">
                                    <span
                                        class="bg-primary text-white"><span>{{ $news['day'] }}</span>{{ $news['mount'] }}</span>
                                </div>
                                <div class="story_text">
                                    <div class="statstic text-primary">
                                        <span>{{ $news['news_category'] }}</span>
                                    </div>
                                    <h3>{{ $news['title'] }}</h3>
                                    <p>{!! \Illuminate\Support\Str::limit($news['description'], 200) !!}</p>
                                    <div class="story_text1">
                                        <a href="{{ route('news.detail', ['slug' => $news['slug']]) }}"
                                            class="btn text_btn text-primary">READ MORE <i
                                                class="icofont-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>


            </div>
        </section>
    @endif
    {{-- @endif --}}
    <!-- Story-Section-end -->

    <!-- FAQ-Section start -->
    @if ($faqs != null)
        @if (count($faqs) > 0)
            <section id="faqBlock" class="row_am faq_section" style="margin-bottom: 80px;">
                <!-- container start -->
                <div class="container">
                    <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                        <!-- h2 -->
                        <h2><span>FAQ</span> - Pertanyaan yang Sering Diajukan</h2>
                        <!-- p -->
                        <p>Menjawab Pertanyaan Umum dan Menyediakan Informasi Penting untuk Pengguna</p>
                    </div>
                    <!-- faq data -->
                    <div class="faq_panel">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $faq)
                                <div class="card" data-aos="fade-up" data-aos-duration="1500">
                                    <div class="card-header" id="heading{{ $faq['id'] }}">
                                        <h2 class="mb-0">
                                            <button type="button"
                                                class="btn btn-link {{ $loop->iteration == 1 ? 'active' : 'collapsed' }}"
                                                data-toggle="collapse" data-target="#collapse{{ $faq['id'] }}">
                                                <i class="icon_faq icofont-plus"></i>{{ $faq['question'] }}</button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{ $faq['id'] }}"
                                        class="collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $faq['id'] }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>{{ $faq['answer'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- container end -->
            </section>
        @endif
    @endif
    <!-- FAQ-Section end -->
@endsection
