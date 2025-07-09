@extends('student.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <h5 class="mb-3 fw-semibold">Wali Kelas</h5>
                                <div class="col-lg-3 col-5 text-center">
                                    <img src="{{ asset('assets/images/default-user.jpeg') }}" width="120px" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="col-lg-8 col-6 col-ms-1">
                                    <h3><b>{{ $classroomStudent->classroom->employee->user->name }}</b></h3>
                                    <h5>Tahun Ajaran {{ $classroomStudent->classroom->schoolYear->school_year }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-6">
                                    <h5 class="fw-semibold">Kelasmu Saat Ini</h5>
                                    <h3 class="my-4"><b>{{ $classroomStudent->classroom->name }}</b></h3>
                                    <div class="badge bg-light-primary text-primary fs-5">
                                        {{ $classroomStudent->classroom->classroomStudents->count() }} Total Siswa
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <img src="{{ asset('assets/images/Topi.png') }}" width="300px" alt=""
                                        class="img-fluid mt-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" href="#pills-student" role="tab"
                aria-controls="pills-student" aria-selected="true">
                Jadwal
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-alumni-tab" data-bs-toggle="pill" href="#pills-alumni" role="tab"
                aria-controls="pills-alumni" aria-selected="false">
                Siswa
            </a>
        </li>
        <li class="nav-item ms-auto">
            <a href="{{ route('student.feedback.show') }}" class="btn mb-1 waves-effect waves-light btn-warning" type="button">Lihat Semua Jadwal
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m16.172 11l-5.364-5.364l1.414-1.414L20 12l-7.778 7.778l-1.414-1.414L16.172 13H4v-2z" />
                </svg>
            </a>
        </li>
    </ul>

    <div class="tab-content mt-4" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
            @include('student.pages.class.panes.schedule')
        </div>
        <div class="tab-pane fade" id="pills-alumni" role="tabpanel" aria-labelledby="pills-alumni-tab">
            @include('student.pages.class.panes.student')
        </div>
    </div>

    @include('student.pages.class.widgets.detail-schedule')
@endsection
@section('script')
    @include('student.pages.class.scripts.detail');
@endsection
