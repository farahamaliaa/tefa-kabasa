@extends('layouts.landing.layouts.app')
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
            background: linear-gradient(45deg, #00bfff, #1e90ff);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn_main:hover {
            background: linear-gradient(45deg, #1e90ff, #00bfff);
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
                <h1 class="text-primary">Paket</h1>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><span>»</span></li>
                    <li><a href="/package">Paket</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
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
                        <div class="feature_card bg-light p-5 text-start">
                            <img src="{{ asset('landing_assets/images/landing/feature-1.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">E - Learning</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                                convallis interdum. Cras id diam rhoncus,</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-2.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Pelanggaran</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                                convallis interdum. Cras id diam rhoncus,</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-3.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Absensi</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                                convallis interdum. Cras id diam rhoncus,</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start">
                            <img src="{{ asset('landing_assets/images/landing/feature-4.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Rapot</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                                convallis interdum. Cras id diam rhoncus,</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-5.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Ujian</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                                convallis interdum. Cras id diam rhoncus,</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature_card bg-light p-5 text-start">
                            <!-- Repeat card content -->
                            <img src="{{ asset('landing_assets/images/landing/feature-6.png') }}" style="width: 70px"
                                alt="image" class="img-fluid">
                            <h3 class="pt-3 text-primary">Buku Tamu</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                                convallis interdum. Cras id diam rhoncus,</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row_am pricing_section" style="margin-bottom: 200px;" id="pricing" data-aos="fade-in" data-aos-duration="1000">
        <!-- container start -->
        <div class="container">
            <div class="section_title px-5 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <div>
                    <h2>Paket Fitur MISCHOOL</h2>
                    <p class="mx-0 mx-md-5">Lihat berbagai paket harga yang ditawarkan oleh Mischool dan temukan yang
                        paling sesuai dengan kebutuhan sekolah Anda di bagian Pricing List.
                    </p>
                </div>
            </div>
            <!-- toggle button -->
            <div class="toggle_block" data-aos="fade-up" data-aos-duration="1500">
                <span class="month active">Bulanan</span>
                <div class="tog_block">
                    <span class="tog_btn"></span>
                </div>
                <span class="years">Tahunan</span>
                <span class="offer">50% off</span>
            </div>

            <!-- pricing box  monthly start -->
            <div class="pricing_pannel monthly_plan active" data-aos="fade-up" data-aos-duration="1500">
                <!-- row start -->
                <div class="row">
                    @forelse (range(1, 3) as $item)
                        <div class="col-md-4">
                            <div class="pricing_block blockwhite" style="padding: 40px 30px">
                                <div class="pkg_name">
                                    <h3 class="mb-3 text-primary">E-Learning</h3>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula lacus
                                        massa, a finibus urna hendrerit fringilla.</span>
                                </div>
                                <span class="price mt-1 text-primary" style="font-size: 32px">Rp.
                                    450.000<span>/bulan</span></span>
                                <a href="#" class="w-100 btn btn-stroke-gradient mb-4">Beli Sekarang</a>
                                <h5 class="fw-bold mb-4">Daftar Fitur paket</h5>
                                <ul>
                                    <li class="border-bottom mb-3 pb-2">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 0C4.71036 0 0 4.71036 0 10.5C0 16.2896 4.71036 21 10.5 21C16.2896 21 21 16.2896 21 10.5C21 4.71036 16.2896 0 10.5 0ZM15.9645 6.98099L9.17993 15.0579C9.1055 15.1466 9.0129 15.2182 8.90838 15.2679C8.80387 15.3176 8.68989 15.3443 8.57416 15.3462H8.56053C8.44732 15.3461 8.33538 15.3223 8.23198 15.2762C8.12858 15.2301 8.03602 15.1628 7.96031 15.0786L5.05262 11.8478C4.97878 11.7695 4.92133 11.6772 4.88366 11.5764C4.846 11.4755 4.82887 11.3682 4.83328 11.2606C4.8377 11.1531 4.86357 11.0475 4.90937 10.9501C4.95518 10.8527 5.01999 10.7654 5.10001 10.6934C5.18002 10.6214 5.27362 10.5661 5.37531 10.5308C5.477 10.4955 5.58472 10.4808 5.69214 10.4877C5.79957 10.4946 5.90452 10.523 6.00085 10.571C6.09717 10.6191 6.18292 10.6859 6.25305 10.7675L8.53933 13.3077L14.7278 5.94209C14.8666 5.7816 15.063 5.68219 15.2745 5.66533C15.486 5.64848 15.6957 5.71554 15.8582 5.85202C16.0206 5.9885 16.1229 6.18343 16.1428 6.39469C16.1627 6.60595 16.0987 6.81655 15.9645 6.98099Z"
                                                fill="#1EBB9E" />
                                        </svg>
                                        <span class="ps-5">Classroom</span>
                                    </li>
                                    <li class="border-bottom mb-3 pb-2">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 0C4.71036 0 0 4.71036 0 10.5C0 16.2896 4.71036 21 10.5 21C16.2896 21 21 16.2896 21 10.5C21 4.71036 16.2896 0 10.5 0ZM15.9645 6.98099L9.17993 15.0579C9.1055 15.1466 9.0129 15.2182 8.90838 15.2679C8.80387 15.3176 8.68989 15.3443 8.57416 15.3462H8.56053C8.44732 15.3461 8.33538 15.3223 8.23198 15.2762C8.12858 15.2301 8.03602 15.1628 7.96031 15.0786L5.05262 11.8478C4.97878 11.7695 4.92133 11.6772 4.88366 11.5764C4.846 11.4755 4.82887 11.3682 4.83328 11.2606C4.8377 11.1531 4.86357 11.0475 4.90937 10.9501C4.95518 10.8527 5.01999 10.7654 5.10001 10.6934C5.18002 10.6214 5.27362 10.5661 5.37531 10.5308C5.477 10.4955 5.58472 10.4808 5.69214 10.4877C5.79957 10.4946 5.90452 10.523 6.00085 10.571C6.09717 10.6191 6.18292 10.6859 6.25305 10.7675L8.53933 13.3077L14.7278 5.94209C14.8666 5.7816 15.063 5.68219 15.2745 5.66533C15.486 5.64848 15.6957 5.71554 15.8582 5.85202C16.0206 5.9885 16.1229 6.18343 16.1428 6.39469C16.1627 6.60595 16.0987 6.81655 15.9645 6.98099Z"
                                                fill="#1EBB9E" />
                                        </svg>
                                        <span class="ps-5">Daftar Tugas</span>
                                    </li>
                                    <li class="border-bottom mb-3 pb-2">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 0C4.71036 0 0 4.71036 0 10.5C0 16.2896 4.71036 21 10.5 21C16.2896 21 21 16.2896 21 10.5C21 4.71036 16.2896 0 10.5 0ZM15.9645 6.98099L9.17993 15.0579C9.1055 15.1466 9.0129 15.2182 8.90838 15.2679C8.80387 15.3176 8.68989 15.3443 8.57416 15.3462H8.56053C8.44732 15.3461 8.33538 15.3223 8.23198 15.2762C8.12858 15.2301 8.03602 15.1628 7.96031 15.0786L5.05262 11.8478C4.97878 11.7695 4.92133 11.6772 4.88366 11.5764C4.846 11.4755 4.82887 11.3682 4.83328 11.2606C4.8377 11.1531 4.86357 11.0475 4.90937 10.9501C4.95518 10.8527 5.01999 10.7654 5.10001 10.6934C5.18002 10.6214 5.27362 10.5661 5.37531 10.5308C5.477 10.4955 5.58472 10.4808 5.69214 10.4877C5.79957 10.4946 5.90452 10.523 6.00085 10.571C6.09717 10.6191 6.18292 10.6859 6.25305 10.7675L8.53933 13.3077L14.7278 5.94209C14.8666 5.7816 15.063 5.68219 15.2745 5.66533C15.486 5.64848 15.6957 5.71554 15.8582 5.85202C16.0206 5.9885 16.1229 6.18343 16.1428 6.39469C16.1627 6.60595 16.0987 6.81655 15.9645 6.98099Z"
                                                fill="#1EBB9E" />
                                        </svg>
                                        <span class="ps-5">Bisa menambahkan Materi dan Tugas Lorem Ipsum dolor sit
                                            ahmet</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <!-- row end -->
            </div>
            <!-- pricing box monthly end -->

            <!-- pricing box yearly start -->
            <div class="pricing_pannel yearly_plan" data-aos="fade-up" data-aos-duration="1500">
                <div class="row">
                    @forelse (range(1, 3) as $item)
                        <div class="col-md-4">
                            <div class="pricing_block blockwhite" style="padding: 40px 30px">
                                <div class="pkg_name">
                                    <h3 class="mb-3 text-primary">E-Learning</h3>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula lacus
                                        massa, a finibus urna hendrerit fringilla.</span>
                                </div>
                                <span class="price mt-1 text-primary" style="font-size: 32px">Rp.
                                    3.000.000<span>/tahun</span></span>
                                <a href="#" class="w-100 btn btn-stroke-gradient mb-4">Beli Sekarang</a>
                                <h5 class="fw-bold mb-4">Daftar Fitur paket</h5>
                                <ul>
                                    <li class="border-bottom mb-3 pb-2">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 0C4.71036 0 0 4.71036 0 10.5C0 16.2896 4.71036 21 10.5 21C16.2896 21 21 16.2896 21 10.5C21 4.71036 16.2896 0 10.5 0ZM15.9645 6.98099L9.17993 15.0579C9.1055 15.1466 9.0129 15.2182 8.90838 15.2679C8.80387 15.3176 8.68989 15.3443 8.57416 15.3462H8.56053C8.44732 15.3461 8.33538 15.3223 8.23198 15.2762C8.12858 15.2301 8.03602 15.1628 7.96031 15.0786L5.05262 11.8478C4.97878 11.7695 4.92133 11.6772 4.88366 11.5764C4.846 11.4755 4.82887 11.3682 4.83328 11.2606C4.8377 11.1531 4.86357 11.0475 4.90937 10.9501C4.95518 10.8527 5.01999 10.7654 5.10001 10.6934C5.18002 10.6214 5.27362 10.5661 5.37531 10.5308C5.477 10.4955 5.58472 10.4808 5.69214 10.4877C5.79957 10.4946 5.90452 10.523 6.00085 10.571C6.09717 10.6191 6.18292 10.6859 6.25305 10.7675L8.53933 13.3077L14.7278 5.94209C14.8666 5.7816 15.063 5.68219 15.2745 5.66533C15.486 5.64848 15.6957 5.71554 15.8582 5.85202C16.0206 5.9885 16.1229 6.18343 16.1428 6.39469C16.1627 6.60595 16.0987 6.81655 15.9645 6.98099Z"
                                                fill="#1EBB9E" />
                                        </svg>
                                        <span class="ps-5">Classroom</span>
                                    </li>
                                    <li class="border-bottom mb-3 pb-2">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 0C4.71036 0 0 4.71036 0 10.5C0 16.2896 4.71036 21 10.5 21C16.2896 21 21 16.2896 21 10.5C21 4.71036 16.2896 0 10.5 0ZM15.9645 6.98099L9.17993 15.0579C9.1055 15.1466 9.0129 15.2182 8.90838 15.2679C8.80387 15.3176 8.68989 15.3443 8.57416 15.3462H8.56053C8.44732 15.3461 8.33538 15.3223 8.23198 15.2762C8.12858 15.2301 8.03602 15.1628 7.96031 15.0786L5.05262 11.8478C4.97878 11.7695 4.92133 11.6772 4.88366 11.5764C4.846 11.4755 4.82887 11.3682 4.83328 11.2606C4.8377 11.1531 4.86357 11.0475 4.90937 10.9501C4.95518 10.8527 5.01999 10.7654 5.10001 10.6934C5.18002 10.6214 5.27362 10.5661 5.37531 10.5308C5.477 10.4955 5.58472 10.4808 5.69214 10.4877C5.79957 10.4946 5.90452 10.523 6.00085 10.571C6.09717 10.6191 6.18292 10.6859 6.25305 10.7675L8.53933 13.3077L14.7278 5.94209C14.8666 5.7816 15.063 5.68219 15.2745 5.66533C15.486 5.64848 15.6957 5.71554 15.8582 5.85202C16.0206 5.9885 16.1229 6.18343 16.1428 6.39469C16.1627 6.60595 16.0987 6.81655 15.9645 6.98099Z"
                                                fill="#1EBB9E" />
                                        </svg>
                                        <span class="ps-5">Daftar Tugas</span>
                                    </li>
                                    <li class="border-bottom mb-3 pb-2">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 0C4.71036 0 0 4.71036 0 10.5C0 16.2896 4.71036 21 10.5 21C16.2896 21 21 16.2896 21 10.5C21 4.71036 16.2896 0 10.5 0ZM15.9645 6.98099L9.17993 15.0579C9.1055 15.1466 9.0129 15.2182 8.90838 15.2679C8.80387 15.3176 8.68989 15.3443 8.57416 15.3462H8.56053C8.44732 15.3461 8.33538 15.3223 8.23198 15.2762C8.12858 15.2301 8.03602 15.1628 7.96031 15.0786L5.05262 11.8478C4.97878 11.7695 4.92133 11.6772 4.88366 11.5764C4.846 11.4755 4.82887 11.3682 4.83328 11.2606C4.8377 11.1531 4.86357 11.0475 4.90937 10.9501C4.95518 10.8527 5.01999 10.7654 5.10001 10.6934C5.18002 10.6214 5.27362 10.5661 5.37531 10.5308C5.477 10.4955 5.58472 10.4808 5.69214 10.4877C5.79957 10.4946 5.90452 10.523 6.00085 10.571C6.09717 10.6191 6.18292 10.6859 6.25305 10.7675L8.53933 13.3077L14.7278 5.94209C14.8666 5.7816 15.063 5.68219 15.2745 5.66533C15.486 5.64848 15.6957 5.71554 15.8582 5.85202C16.0206 5.9885 16.1229 6.18343 16.1428 6.39469C16.1627 6.60595 16.0987 6.81655 15.9645 6.98099Z"
                                                fill="#1EBB9E" />
                                        </svg>
                                        <span class="ps-5">Bisa menambahkan Materi dan Tugas Lorem Ipsum dolor sit
                                            ahmet</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <!-- container start end -->
    </section>
@endsection
