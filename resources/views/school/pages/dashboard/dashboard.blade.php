@extends('school.layouts.app')

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

        @media (max-width: 767.98px) {
            .card {
                height: auto !important;
            }

            .position-absolute {
                position: relative;
                width: 100px;
                margin-bottom: 0;
                margin-right: 0;
            }

            .row.d-flex.align-items-stretch {
                flex-direction: column;
            }

            .col-lg-3,
            .col-lg-9 {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .card {
                height: auto;
            }

            .position-absolute {
                width: 100px;
                margin-bottom: -10px;
                margin-right: -10px;
            }

            .col-lg-3,
            .col-lg-9 {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>

    @include('school.pages.dashboard.style.journal-statistics')
@endsection

@section('content')
    @include('school.pages.dashboard.panes.corousel')

    @include('school.pages.dashboard.panes.school-year')

    <h4 class="mb-4"><b>Data Absensi Hari Ini</b></h4>

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row justify-content-between border shadow">
        <div class="d-flex">
            <li class="nav-item">
                <a href="#student-content" data-bs-toggle="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="student">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M17.928 19.634h2.138a1.165 1.165 0 0 0 1.116-1.555a6.851 6.851 0 0 0-6.117-3.95m0-2.759a3.664 3.664 0 0 0 3.665-3.664a3.664 3.664 0 0 0-3.665-3.674m-1.04 16.795a1.908 1.908 0 0 0 1.537-3.035a8.026 8.026 0 0 0-6.222-3.196a8.026 8.026 0 0 0-6.222 3.197a1.909 1.909 0 0 0 1.536 3.034zM9.34 11.485a4.16 4.16 0 0 0 4.15-4.161a4.151 4.151 0 0 0-8.302 0a4.16 4.16 0 0 0 4.151 4.16" />
                    </svg>
                    <span class="d-none d-md-block ms-2 font-weight-medium">Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#employee-content" data-bs-toggle="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="employee">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 36">
                        <path fill="currentColor"
                            d="M16.43 16.69a7 7 0 1 1 7-7a7 7 0 0 1-7 7m0-11.92a5 5 0 1 0 5 5a5 5 0 0 0-5-5M22 17.9a25.4 25.4 0 0 0-16.12 1.67a4.06 4.06 0 0 0-2.31 3.68v5.95a1 1 0 1 0 2 0v-5.95a2 2 0 0 1 1.16-1.86a22.9 22.9 0 0 1 9.7-2.11a23.6 23.6 0 0 1 5.57.66Zm.14 9.51h6.14v1.4h-6.14z" />
                        <path fill="currentColor"
                            d="M33.17 21.47H28v2h4.17v8.37H18v-8.37h6.3v.42a1 1 0 0 0 2 0V20a1 1 0 0 0-2 0v1.47H17a1 1 0 0 0-1 1v10.37a1 1 0 0 0 1 1h16.17a1 1 0 0 0 1-1V22.47a1 1 0 0 0-1-1" />
                    </svg>
                    <span class="d-none d-md-block ms-2 font-weight-medium">Guru</span>
                </a>
            </li>
        </div>

        <form class="mt-4 mt-md-0">
            <div class="form-group d-flex gap-2">
                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
    </ul>


    <div class="tab-content mb-4">
        <div id="student-content" class="tab-pane fade show active">
            <div class="note-has-grid row">
                <div class="col-12">
                    @include('school.pages.dashboard.panes.student-tab.index')
                </div>
            </div>
        </div>

        <div id="employee-content" class="tab-pane fade">
            <div class="note-has-grid row">
                <div class="col-12">
                    @include('school.pages.dashboard.panes.employee-tab.index')
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-4"><b>Data Jurnal Guru Hari Ini / </b>
        <span class="mb-1 badge font-medium bg-light-primary text-primary" style="font-size: ">
            <b>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</b>
        </span>
    </h4>

    @include('school.pages.dashboard.panes.teacher-journal')

    <h4 class="mb-4"><b>Data Pelanggaran</b></h4>
    @include('school.pages.dashboard.panes.violations-list')

    {{-- <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="d-md-flex align-items-center gap-3 justify-content-between mb-3">
                        <div>
                            <h5 class="card-title fw-semibold">Statistik Absensi</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-4 mt-md-0">
                            <form>
                                <div class="form-group mb-4">
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>2024</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="investments"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">Statistik Jurnal Guru</h5>
                            <h4 class="fw-semibold mb-3">5 Juli 2024</h4>
                            <div class=" align-items-center">
                                <div class="me-4">
                                    <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">Sudah Mengisi</span>
                                </div>
                                <div>
                                    <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">Belum Mengisi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div id="jurnal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('school.pages.dashboard.widgets.violation-detail')
@endsection

@section('script')
    {{-- <script src="{{ asset('admin_assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin_assets/dist/js/apex-chart/apex.area.init.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin_assets/dist/js/dashboard.js') }}"></script> --}}

    @include('school.pages.dashboard.scripts.script-corousel')
    @include('school.pages.dashboard.scripts.chart-student')
    @include('school.pages.dashboard.scripts.chart-violations')
    @include('school.pages.dashboard.scripts.btn-detail')

    <script>
        $(function() {
            var attendanceChartData = @json($attendanceChart);

            var categories = attendanceChartData.map(item => item.month);
            var data1 = attendanceChartData.map(item => item.attendance_present);
            var data2 = attendanceChartData.map(item => item.attendance_permit);
            var data3 = attendanceChartData.map(item => item.attendance_sick);
            var data4 = attendanceChartData.map(item => item.attendance_alpha);

            var investments = {
                series: [{
                        name: "Masuk",
                        data: data1,
                    },
                    {
                        name: "Izin",
                        data: data2,
                    },
                    {
                        name: "Sakit",
                        data: data3,
                    },
                    {
                        name: "Alpha",
                        data: data4,
                    },
                ],
                chart: {
                    ffontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                    height: 325,
                    type: "line",
                    toolbar: {
                        show: false,
                    },
                },
                legend: {
                    show: false,
                },
                stroke: {
                    width: 4,
                    curve: "smooth",
                },
                grid: {
                    borderColor: "transparent",
                },
                colors: ["#13deb9", "#5d87ff", "#ffae1f", "#fa896b"],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        gradientToColors: ["#6993ff"],
                        shadeIntensity: 1,
                        type: "horizontal",
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100],
                    },
                },
                markers: {
                    size: 0,
                },
                xaxis: {
                    type: 'category',
                    categories: categories,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    }
                },
                tooltip: {
                    theme: "dark",
                },
            };
            new ApexCharts(document.querySelector("#investments"), investments).render();
        });
    </script>

    <script>
        var breakupOptions = {
            chart: {
                type: 'donut',
                width: 180,
                fontFamily: "'Plus Jakarta Sans', sans-serif",
                foreColor: '#adb0bb',
            },
            series: [38, 40],
            labels: ['Mengisi', 'Tidak Mengisi'],
            plotOptions: {
                pie: {
                    startAngle: 0,
                    endAngle: 360,
                    donut: {
                        size: '75%',
                    },
                },
            },
            colors: ['var(--bs-primary)', '#ecf2ff', '#F9F9FD'],
            stroke: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            responsive: [{
                breakpoint: 991,
                options: {
                    chart: {
                        width: 120,
                    },
                },
            }, ],
            tooltip: {
                theme: 'dark',
                fillSeriesColor: false,
            },
        };

        var chart = new ApexCharts(document.querySelector('#jurnal'), breakupOptions);
        chart.render();
    </script>
@endsection
