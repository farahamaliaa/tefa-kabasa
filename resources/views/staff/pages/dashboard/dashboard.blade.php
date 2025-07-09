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
    </style>
@endsection

@section('content')
    @include('staff.pages.dashboard.panes.corousel')

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Absensi Hari Ini:</h5>
                            <h5 class="mb-0 pt-3">10 Mei 2023 - 08.00</h5>
                        </div>
                        <div>
                            <span class="mb-1 fs-7 badge font-medium py-3 px-5 rounded-2 bg-light-success text-success">Masuk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <h4 class=""><b>Riwayat Jurnal</b></h4>
    <p>Daftar jurnal staff setelah melakukan kegiatan</p>

    @include('staff.pages.dashboard.panes.journal-history')

@endsection

@section('script')
    @include('staff.pages.dashboard.scripts.script-corousel')
@endsection
