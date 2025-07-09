@extends('school.layouts.app')

@section('style')
<style>
    .category-selector .dropdown-menu {
        position: absolute;
        z-index: 1050;
        transform: translate3d(0, 0, 0);
    }

    .select2 {
        width: 100% !important;
    }

    .select2-selection__rendered {
        width: 100%;
        height: 36px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .select2-selection {
        height: fit-content !important;
        color: #555 !important;
        background-color: #fff !important;
        background-image: none !important;
        border: 1px solid #ccc !important;
        border-radius: 4px !important;
    }
</style>

<style>
    .category-selector .dropdown-menu {
        position: absolute;
        z-index: 1050;
        transform: translate3d(0, 0, 0);
    }

    .select2-custom {
        width: 100% !important;
    }

    .select2-custom-selection__rendered {
        width: 100%;
        height: 36px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .select2-custom-selection {
        height: fit-content !important;
        color: #555 !important;
        background-color: #fff !important;
        background-image: none !important;
        border: 1px solid #ccc !important;
        border-radius: 4px !important;
    }
</style>
@endsection

@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Jadwal Pelajaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">{{ $classroom->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="card card-body shadow">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-pills rounded align-items-center flex-row" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-senin-tab" data-bs-toggle="pill" href="#pills-senin" role="tab"
                        aria-controls="pills-senin" aria-selected="true">
                        Senin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-selasa-tab" data-bs-toggle="pill" href="#pills-selasa" role="tab"
                        aria-controls="pills-selasa" aria-selected="false">
                        Selasa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-rabu-tab" data-bs-toggle="pill" href="#pills-rabu" role="tab"
                        aria-controls="pills-rabu" aria-selected="false">
                        Rabu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-kamis-tab" data-bs-toggle="pill" href="#pills-kamis" role="tab"
                        aria-controls="pills-kamis" aria-selected="false">
                        Kamis
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-jumat-tab" data-bs-toggle="pill" href="#pills-jumat" role="tab"
                        aria-controls="pills-jumat" aria-selected="false">
                        Jumat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-sabtu-tab" data-bs-toggle="pill" href="#pills-sabtu" role="tab"
                        aria-controls="pills-sabtu" aria-selected="false">
                        Sabtu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-minggu-tab" data-bs-toggle="pill" href="#pills-minggu" role="tab"
                        aria-controls="pills-minggu" aria-selected="false">
                        Minggu
                    </a>
                </li>
            </ul>
            {{-- Export Jadwal Kelas --}}
            {{-- <a class="btn btn-primary" href="{{ route('school.lesson-schedule.export', ['classroom' => $classroom->id]) }}">
                Export Jadwal Kelas
            </a> --}}
        </div>
    </div>

    <div class="mt-2 card card-body shadow">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-senin" role="tabpanel" aria-labelledby="pills-senin-tab">
                @include('school.pages.lesson-schedule.panes.tab-monday')
            </div>
            <div class="tab-pane fade" id="pills-selasa" role="tabpanel" aria-labelledby="pills-selasa-tab">
                @include('school.pages.lesson-schedule.panes.tab-tuesday')
            </div>
            <div class="tab-pane fade" id="pills-rabu" role="tabpanel" aria-labelledby="pills-rabu-tab">
                @include('school.pages.lesson-schedule.panes.tab-wednesday')
            </div>
            <div class="tab-pane fade" id="pills-kamis" role="tabpanel" aria-labelledby="pills-kamis-tab">
                @include('school.pages.lesson-schedule.panes.tab-thursday')
            </div>
            <div class="tab-pane fade" id="pills-jumat" role="tabpanel" aria-labelledby="pills-jumat-tab">
                @include('school.pages.lesson-schedule.panes.tab-friday')
            </div>
            <div class="tab-pane fade" id="pills-sabtu" role="tabpanel" aria-labelledby="pills-sabtu-tab">
                @include('school.pages.lesson-schedule.panes.tab-saturday')
            </div>
            <div class="tab-pane fade" id="pills-minggu" role="tabpanel" aria-labelledby="pills-minggu-tab">
                @include('school.pages.lesson-schedule.panes.tab-sunday')
            </div>
        </div>
    </div>

    @include('components.delete-modal-component')
    @include('school.pages.lesson-schedule.widgets.create')
    @include('school.pages.lesson-schedule.widgets.update')
    @include('school.pages.lesson-schedule.widgets.import')

@endsection

@section('script')
    @include('school.pages.lesson-schedule.scripts.create')
    @include('school.pages.lesson-schedule.scripts.update')
    @include('school.pages.lesson-schedule.scripts.delete')
    @include('school.pages.lesson-schedule.scripts.select2')
    @include('school.pages.lesson-schedule.scripts.tab')
@endsection
