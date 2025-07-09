@extends('student.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-light">Jadwal Pelajaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Kelas - {{ $classroomStudent->classroom->name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-monday-tab" data-bs-toggle="pill" href="#pills-monday" role="tab"
                aria-controls="pills-monday" aria-selected="true">
                Senin
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-tuesday-tab" data-bs-toggle="pill" href="#pills-tuesday" role="tab"
                aria-controls="pills-tuesday" aria-selected="false">
                Selasa
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-wednesday-tab" data-bs-toggle="pill" href="#pills-wednesday" role="tab"
                aria-controls="pills-wednesday" aria-selected="false">
                Rabu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-thursday-tab" data-bs-toggle="pill" href="#pills-thursday" role="tab"
                aria-controls="pills-thursday" aria-selected="false">
                Kamis
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-friday-tab" data-bs-toggle="pill" href="#pills-friday" role="tab"
                aria-controls="pills-friday" aria-selected="false">
                Jumat
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-saturday-tab" data-bs-toggle="pill" href="#pills-saturday" role="tab"
                aria-controls="pills-saturday" aria-selected="false">
                Sabtu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-sunday-tab" data-bs-toggle="pill" href="#pills-sunday" role="tab"
                aria-controls="pills-sunday" aria-selected="false">
                Minggu
            </a>
        </li>
        <li class="nav-item ms-auto">
            <a href="/student/class" class="btn mb-1 waves-effect waves-light btn-warning" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 12h14M5 12l6 6m-6-6l6-6" />
                </svg>
                Kembali
            </a>
        </li>
    </ul>

    <div class="tab-content mt-4" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-monday" role="tabpanel" aria-labelledby="pills-monday-tab">
            @include('student.pages.class.panes.all-schedule-panes.monday')
        </div>
        <div class="tab-pane fade" id="pills-tuesday" role="tabpanel" aria-labelledby="pills-tuesday-tab">
            @include('student.pages.class.panes.all-schedule-panes.tuesday')
        </div>
        <div class="tab-pane fade" id="pills-wednesday" role="tabpanel" aria-labelledby="pills-wednesday-tab">
            @include('student.pages.class.panes.all-schedule-panes.wednesday')
        </div>
        <div class="tab-pane fade" id="pills-thursday" role="tabpanel" aria-labelledby="pills-thursday-tab">
            <!-- Content for Thursday -->
            @include('student.pages.class.panes.all-schedule-panes.thursday')
        </div>
        <div class="tab-pane fade" id="pills-friday" role="tabpanel" aria-labelledby="pills-friday-tab">
            <!-- Content for Friday -->
            @include('student.pages.class.panes.all-schedule-panes.friday')
        </div>
        <div class="tab-pane fade" id="pills-saturday" role="tabpanel" aria-labelledby="pills-saturday-tab">
            <!-- Content for Saturday -->
            @include('student.pages.class.panes.all-schedule-panes.saturday')
        </div>
        <div class="tab-pane fade" id="pills-sunday" role="tabpanel" aria-labelledby="pills-sunday-tab">
            <!-- Content for Sunday -->
            @include('student.pages.class.panes.all-schedule-panes.sunday')
        </div>
    </div>

    @include('student.pages.class.widgets.detail-all-schedule')
@endsection

@section('script')
    @include('student.pages.class.scripts.detail');
@endsection
