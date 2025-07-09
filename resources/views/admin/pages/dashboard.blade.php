@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<style>
    .nav-tabs .nav-link {
        margin-bottom: calc(-1* var(--bs-nav-tabs-border-width));
        border: var(--bs-nav-tabs-border-width) solid transparent;
        border-top-left-radius: var(--bs-nav-tabs-border-radius);
        border-top-right-radius: var(--bs-nav-tabs-border-radius);
        color: rgba(var(--bs-primary-rgb), var(--bs-border-opacity));
        border-radius: 5px;
        margin-right: 0.5px;
    }

</style>
@endsection

@section('content')
<div class="owl-carousel custom-carousel owl-theme">
    {{-- <div class="item">
        <div class="card border-0 zoom-in bg-light-warning shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 32 32">
                        <path fill="#FFAE1F" d="m28.504 8.136l-12-7a1 1 0 0 0-1.008 0l-12 7A1 1 0 0 0 3 9v14a1 1 0 0 0 .496.864l12 7a1 1 0 0 0 1.008 0l12-7A1 1 0 0 0 29 23V9a1 1 0 0 0-.496-.864M16 3.158L26.016 9L16 14.842L5.984 9ZM5 10.74l10 5.833V28.26L5 22.426Zm12 17.52V16.574l10-5.833v11.685Z" />
                    </svg>
                    <p class="fw-semibold fs-5 mt-2 text-warning mb-1">Paket</p>
                    <h5 class="fw-semibold text-warning mb-0">0</h5>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="item">
        <div class="card border-0 zoom-in bg-light-success shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="60" height="60" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 9L12 5L2 9l10 4l10-4v6"></path>
                            <path d="M6 10.6V16a6 3 0 0 0 12 0v-5.4"></path>
                        </g>
                    </svg>
                    <p class="fw-semibold fs-5 mt-2 text-success mb-1">Sekolah Aktif</p>
                    <h5 class="fw-semibold text-success mb-0">{{ $school_active }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-light-danger shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="60" height="60" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 9L12 5l-2.136.854M7 7L2 9l10 4l.697-.279m2.878-1.151L22 9v6"></path>
                            <path d="M6 10.6V16c0 1.657 2.686 3 6 3c2.334 0 4.357-.666 5.35-1.64M18 14v-3.4M3 3l18 18"></path>
                        </g>
                    </svg>
                    <p class="fw-semibold fs-3 mt-2 text-danger mb-1">Sekolah Tidak Aktif</p>
                    <h5 class="fw-semibold text-danger mb-0">{{ $school_not_active }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-light-info shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 14 14">
                        <path fill="#5D87FF" fill-rule="evenodd" d="M6.375 1.653C5.386 1.099 3.536.42 1.496.179C.674.082 0 .76 0 1.588v8c0 .829.677 1.489 1.492 1.637c1.84.334 3.371 1.216 4.348 1.914c.164.117.345.205.535.266zm1.25 11.752c.19-.06.37-.149.534-.265c.977-.698 2.508-1.581 4.349-1.915c.815-.148 1.492-.808 1.492-1.637v-8C14 .76 13.326.082 12.504.18c-2.04.242-3.89.92-4.879 1.474v11.752Z" clip-rule="evenodd" />
                    </svg>
                    <p class="fw-semibold fs-5 mt-2 text-info mb-1">Guru</p>
                    <h5 class="fw-semibold text-info mb-0">{{ $teachers }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="card card-body">
    <div class="d-flex justify-content-between">
        <b>Total Pendapatan Keseluruhan</b>
        <div>
            <select name="" class="form-select">
                <option value="">2020</option>
                <option value="">2021</option>
                <option value="">2022</option>
            </select>
        </div>
    </div>
    <h4 class="text-primary">Rp. 3.500.000</h4>
    <div id="chart-pendapatan"></div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h4 class="fw-semibold">Statistik Paket</h4>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link border-primary border-1 px-4 active" data-bs-toggle="tab" href="#e-learning" role="tab" aria-selected="false" tabindex="-1">
                            <span>E-Learning</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link border-primary border-1 px-4" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false" tabindex="-1">
                            <span>Ujian</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link border-primary border-1 px-4" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="true">
                            <span>Pelanggaran</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="e-learning" role="tabpanel">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-4">
                                <h3 class="text-primary">Rp 3.500.000</h3>
                                <div class="d-flex gap-2">
                                    <select name="" class="form-select" id="search-status">
                                        <option value="">Januari</option>
                                        <option value="">February</option>
                                        <option value="">Maret</option>
                                    </select>
                                    <select name="" class="form-select" id="search-tahun">
                                        <option value="">2022</option>
                                        <option value="">2023</option>
                                        <option value="">2024</option>
                                    </select>
                                </div>
                            </div>
                            <div id="chart-eLearning"></div>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="profile" role="tabpanel">
                        <h3>Clean Tab ever</h3>
                        <h4>you can use it with the small code</h4>
                        <p>
                            Donec pede justo, fringilla vel, aliquet nec,
                            vulputate eget, arcu. In enim justo, rhoncus ut,
                            imperdiet a.
                        </p>
                    </div>
                    <div class="tab-pane p-3" id="messages" role="tabpanel">
                        <h3>Best Tab ever</h3>
                        <h4>you can use it with the small code</h4>
                        <p>
                            Donec pede justo, fringilla vel, aliquet nec,
                            vulputate eget, arcu. In enim justo, rhoncus ut,
                            imperdiet a.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <h4 class="fw-semibold">
            Statistik
        </h4>
        <div class="card card-body">
            <div class="d-flex align-items-start mb-3">
                <h5>Pendapatan Bulan Ini</h5>
                <div class="ms-auto">
                    <div class="bg-primary text-light d-inline-block p-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024">
                            <path fill="currentColor" d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <span class="badge text-primary bg-light-primary fs-5 p-3 fw-semibold">1.500.000</span>
            </div>
        </div>
        <div class="card card-body">
            <div class="d-flex align-items-start mb-3">
                <h5>Paket Terlaris</h5>
                <div class="ms-auto">
                    <div class="bg-success text-light d-inline-block p-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024">
                            <path fill="currentColor" d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <span class="badge text-success bg-light-success fs-5 p-3 fw-semibold">Paket E-Learning</span>
            </div>
        </div>
        <div class="card card-body">
            <div class="d-flex align-items-start mb-3">
                <h5>Paket Kurang Laris</h5>
                <div class="ms-auto">
                    <div class="bg-warning text-light d-inline-block p-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024">
                            <path fill="currentColor" d="M448 224a64 64 0 1 0 128 0a64 64 0 1 0-128 0m96 168h-64c-4.4 0-8 3.6-8 8v464c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V400c0-4.4-3.6-8-8-8" />
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <span class="badge text-warning bg-light-warning fs-5 p-3 fw-semibold">Buku Tamu</span>
            </div>
        </div>
    </div>
</div>

<div class="card card-body">
    <h5>Riwayat Transaksi Terbaru</h5>

    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Tanggal Pembelian</th>
                    <th>Pembeli</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,5) as $item)
                <tr>
                    <td>E-Learning</td>
                    <td>20 Mei 2023</td>
                    <td>SMKN 1 KEPANJEN</td>
                    <td>100.000</td>
                    <td>
                        <span class="badge bg-light-primary text-primary px-4">Aktif</span>
                    </td>
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>

</div>

<div class="row">
    @forelse (range(1,3) as $item)
    <div class="col-md-4">
        <div class="card bg-transparent shadow-none border-1" style="border-bottom: 6px solid #5D87FF!important;">
            <img src="{{ asset('admin_assets/dist/images/profile/no-data.png') }}" class="w-100" height="180px" style="object-fit: cover" alt="">
<div class="p-4">
    <div class="d-flex justify-content-between">
        <h4 class="fw-semibold">Jurnal</h4>
        <div>
            <span class="badge bg-light-primary text-primary">Terlaris</span>
        </div>
    </div>
    <h3 class="text-primary fw-semibold mt-3 mb-3">Rp450.000</h3>
    <p>Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet. Lorem ipsum Dolor Sit Amet</p>

    <div class="border-bottom border-1 border-primary mt-4"></div>

    <div class="mb-4 d-flex mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
        </svg>
        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Data Siswa</p>
    </div>
    <div class="mb-4 d-flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
        </svg>
        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Bisa menambahkan Materi dan Tugas Lorem Ipsum dolor sit ahmet</p>
    </div>
    <div class="mb-4 d-flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
        </svg>
        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Bisa menambahkan Materi dan Tugas Lorem Ipsum dolor sit ahmet</p>
    </div>
</div>
</div>
</div>
@empty

@endforelse
<div class="mb-3">
    <button class="btn btn-primary w-100">
        Lihat Selengkapnya
    </button>
</div>
</div> --}}

@endsection

@section('script')
<script src="{{ asset('admin_assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('admin_assets/dist/js/apex-chart/apex.area.init.js') }}"></script>
<script src="{{ asset('admin_assets/dist/js/dashboard.js') }}"></script>

{{-- <script>
    var options = {
        series: [{
            name: "Desktops"
            , data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }]
        , chart: {
            height: 350
            , type: 'line'
            , zoom: {
                enabled: false
            }
        }
        , dataLabels: {
            enabled: false
        }
        , stroke: {
            curve: 'straight'
        }
        , grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            }
        , }
        , xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        , }
    };

    var chart = new ApexCharts(document.querySelector("#chart-pendapatan"), options);
    chart.render();

</script>

<script>
    var options = {
        series: [{
            name: "Desktops"
            , data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }]
        , chart: {
            height: 350
            , type: 'line'
            , zoom: {
                enabled: false
            }
        }
        , dataLabels: {
            enabled: false
        }
        , stroke: {
            curve: 'straight'
        }
        , grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            }
        , }
        , xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        , }
    };

    var chart = new ApexCharts(document.querySelector("#chart-eLearning"), options);
    chart.render();

</script> --}}

<script>
    $(document).ready(function() {
        $(".custom-carousel").owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>


@endsection
