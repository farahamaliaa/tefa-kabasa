    <!-- Footer-Section start -->
    <footer>
        <div class="top_footer" id="contact" style="background-color: #5A6A85;">

            {{-- <div class="container">
                <div class="anim_line dark_bg">
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                    <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                </div>
            </div> --}}

            <!-- container start -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                    <!-- footer link 1 -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="abt_side">
                            <div class="logo"> <img src="{{ asset('landing_assets/images/logo/kabasa-white.png') }}"
                                    alt="image"></div>
                            <p>Kabasa hadir sebagai solusi manajemen sekolah yang inovatif, mendukung berbagai aktivitas dan proses dalam lingkungan pendidikan.</p>
                            <div class="news_letter_block">
                            </div>
                        </div>
                    </div>

                    <!-- footer link 2 -->
                    <div class="col-lg-2 col-md-6 col-12">
                        <div class="links">
                            <h3>Menu</h3>
                            <ul>
                                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li><a href="{{ route('about-us') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('contact-us') }}">Kontak</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- footer link 3 -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="links">
                            <h3>Fitur - fitur</h3>
                            <ul>
                                <li><a href="javascript:void(0)">Absensi</a></li>
                                <li><a href="javascript:void(0)">Jurnal Mengajar</a></li>
                                <li><a href="javascript:void(0)">Jurnal Staf</a></li>
                                <li><a href="javascript:void(0)">Pelanggaran & Perbaikan</a></li>
                                <li><a href="javascript:void(0)">Tanggapan Siswa</a></li>
                                <li><a href="javascript:void(0)">Buku Tamu</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- footer link 4 -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="try_out">
                            <h3>Hubungi</h3>
                            <ul>
                                <li>
                                    <span class="icon">
                                        <img src="{{ asset('landing_assets/images/new/contact_01.png') }}"
                                            alt="image">
                                    </span>
                                    <div class="text">
                                        <p>Jl. PB.Sudirman, Tekoan, Tanggul Kulon, Kec. Tanggul, Kabupaten Jember, Jawa Timur 68155</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="icon">
                                        <img src="{{ asset('landing_assets/images/new/contact_02.png') }}"
                                            alt="image">
                                    </span>
                                    <div class="text">
                                        <p>Telepon kami <a href="tel:+62-82132560566">(0336) 441347</a></p>
                                    </div>
                                </li>
                                <li>
                                    <span class="icon">
                                        <img src="{{ asset('landing_assets/images/new/contact_03.png') }}"
                                            alt="image">
                                    </span>
                                    <div class="text">
                                        <p>Email kami <a href="mailto:smkn6.jember@yahoo.com">smkn6.jember@yahoo.com</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>

        <!-- last footer -->
        <div class="bottom_footer" style="background-color: #5A6A85; border-color: white">
            <!-- container start -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                    {{-- <div class="col-md-4">
                        <p>© Copyrights 2024. All rights reserved.</p>
                    </div> --}}
                    <div class="col-md-4">
                        <ul class="social_media">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/mischool.id/"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <p class="developer_text">
                            Dikembangkan oleh
                            <a href="https://www.smkbabussalam.sch.id/" target="_blank"> <img
                                    src="{{ asset('landing_assets/images/logo/smk-text.png') }}"
                                    class="dark-logo img-fluid" width="170" alt="Logo SMK Babussalam"
                                    style="margin-left: 8px;" /></a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 15 15"
                                class="mx-2">
                                <path fill="currentColor"
                                    d="M3.64 2.27L7.5 6.13l3.84-3.84A.92.92 0 0 1 12 2a1 1 0 0 1 1 1a.9.9 0 0 1-.27.66L8.84 7.5l3.89 3.89A.9.9 0 0 1 13 12a1 1 0 0 1-1 1a.92.92 0 0 1-.69-.27L7.5 8.87l-3.85 3.85A.92.92 0 0 1 3 13a1 1 0 0 1-1-1a.9.9 0 0 1 .27-.66L6.16 7.5L2.27 3.61A.9.9 0 0 1 2 3a1 1 0 0 1 1-1c.24.003.47.1.64.27" />
                            </svg>
                            <a href="https://hummatech.com/" target="_blank">
                                <img src="{{ asset('landing_assets/images/logo/LOGO-HUMMATECH_Putih.png') }}"
                                    class="dark-logo img-fluid" width="150" alt="Logo HUMMATECH"
                                    style="margin-left: 8px;" />
                            </a>
                        </p>
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>

        <!-- go top button -->
        <div class="go_top" id="Gotop">
            <span><i class="icofont-arrow-up"></i></span>
        </div>
    </footer>
