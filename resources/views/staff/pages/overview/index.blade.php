@extends('staff.layouts.app')

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



        @media (max-width: 991.98px) {
            .card {
                height: auto;
            }

            .position-absolute {
                position: static;
                margin-bottom: 0;
                margin-right: 0;
                width: 100px;
            }

            .fs-5 {
                font-size: 1.25rem;
            }

            .badge {
                font-size: 0.75rem;
            }

            .card-body {
                padding: 1rem;
            }

            .card-body ul li {
                padding-bottom: 6px;
            }
        }

        @media (max-width: 767.98px) {
            .d-flex {
                flex-direction: column;
            }

            .col-lg-3,
            .col-lg-9 {
                width: 100%;
                padding: 0;
            }

            .card-body {
                padding: 0.5rem;
            }
        }
    </style>
@endsection

@section('content')
    @include('staff.pages.overview.panes.corousel')

    <div class="row d-flex align-items-stretch">
        @include('staff.pages.overview.panes.max-point')
    </div>

    <div class="col-lg-12 d-flex">
        <div class="card w-100 h-100 overflow-hidden border">
            <div class="card-body">
                <div class="row align-items-center">
                    <div id="chart-violation" class="d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border shadow">
        <div class="card-body">
            <h5 class="mb-4"><b>Pelanggaran Terpopuler Bulan Ini
                    <span class="ms-2 me-2">|</span>{{ \Carbon\Carbon::now()->translatedFormat('F') }}</b></h5>

            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr class="">
                            <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">No
                            </th>
                            <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Nama
                                Pelanggaran
                            </th>
                            <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Point
                            </th>
                            <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Jumlah
                                Siswa Melanggar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($top_violations as $top_violation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $top_violation->violation }}
                                </td>
                                <td>
                                    <span class="badge bg-light-danger text-danger fw-semibold fs-2">+
                                        {{ $top_violation->point }} Point</span>
                                </td>
                                <td>{{ $top_violation->studentViolations->count() }} Siswa</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center align-middle">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                            width="300px">
                                        <p class="fs-5 text-dark text-center mt-2">Belum ada data</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a class="btn mb-1 waves-effect waves-light btn-outline-primary w-100">Lihat Selengkapnya</a>
        </div>
    </div>

    <h4 class=""><b>Statistik Kelas Pelanggar Terbanyak</b></h4>

    @if ($classroom != null)
        @include('staff.pages.overview.panes.violation-class')
    @else
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
            <p class="fs-5 text-dark text-center mt-2">Belum ada data</p>
        </div>
    @endif

    <h4 class=""><b>Data Point Siswa</b></h4>
    @include('staff.pages.overview.panes.point-student')
@endsection

@section('script')
    @include('staff.pages.overview.scripts.script-corousel')
    @include('staff.pages.overview.scripts.script-line-chart')
@endsection
