@extends('school.layouts.app')

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Siswa</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">Daftar - daftar siswa dan alumni di Sekolah</a></li>
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

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="card rounded-3 card-hover border position-relative">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light-success text-success d-inline-block px-3 py-3 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="40" height="40"
                                viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                            </svg>
                        </div>
                        <div class="ms-4">
                            <h4 class="card-title text-dark"><b>Jumlah Siswa</b></h4>
                            <h6 style="font-size: 25px; color: #13DEB9"><b>{{ $studentCount }}</b></h6>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('assets/images/background/buble-2.png') }}" alt="Image"
                    style="position: absolute; bottom: 0; right: 0; width: auto; height: 90px; border-bottom-right-radius: 13px;">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="card rounded-3 card-hover border position-relative">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light-warning text-warning d-inline-block px-3 py-3 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="m16 4.875l-.469.25l-13.5 7L.312 13L2 13.844v8.437c-.598.348-1 .98-1 1.719a1.999 1.999 0 1 0 4 0c0-.738-.402-1.371-1-1.719v-7.406l2 1.031V21c0 .441.203.84.438 1.094s.519.406.812.562c.59.309 1.29.528 2.156.719c1.735.387 4.047.625 6.594.625s4.86-.238 6.594-.625c.867-.191 1.566-.41 2.156-.719c.293-.156.578-.308.813-.562A1.66 1.66 0 0 0 26 21v-5.094l3.969-2.031L31.687 13l-1.718-.875l-13.5-7zm0 2.25L27.313 13l-1.782.906a3 3 0 0 0-.781-.562c-.586-.309-1.29-.528-2.156-.719C20.864 12.238 18.559 12 16 12s-4.863.238-6.594.625c-.867.191-1.57.41-2.156.719a3 3 0 0 0-.781.562L4.687 13zM16 14c2.441 0 4.637.223 6.156.563c.758.167 1.367.363 1.688.53c.101.055.117.095.156.126v3.812a11 11 0 0 0-1.406-.406C20.859 18.238 18.547 18 16 18s-4.86.238-6.594.625c-.531.117-.988.254-1.406.406V15.22c.04-.031.055-.07.156-.125c.32-.168.93-.364 1.688-.531C11.364 14.223 13.559 14 16 14m0 6c2.426 0 4.633.223 6.156.563a7 7 0 0 1 1.375.437a7 7 0 0 1-1.375.438c-1.523.34-3.73.562-6.156.562s-4.633-.223-6.156-.563A7 7 0 0 1 8.469 21a7 7 0 0 1 1.375-.438C11.367 20.223 13.574 20 16 20" />
                            </svg>
                        </div>
                        <div class="ms-4">
                            <h4 class="card-title text-dark"><b>Jumlah Alumni</b></h4>
                            <h6 style="font-size: 25px; color: #FFAE1F"><b>{{ $alumnus->count() }}</b></h6>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('assets/images/background/buble-3.png') }}" alt="Image"
                    style="position: absolute; bottom: 0; right: 0; width: auto; height: 90px; border-bottom-right-radius: 13px;">
            </div>
        </div>
    </div>

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" href="#pills-student" role="tab"
                aria-controls="pills-student" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 16 16">
                    <path fill="currentColor"
                        d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                </svg>
                Siswa
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-alumni-tab" data-bs-toggle="pill" href="#pills-alumni" role="tab"
                aria-controls="pills-alumni" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="18" height="18"
                    viewBox="0 0 1024 1024">
                    <path fill="currentColor"
                        d="M990.848 696.304V438.16l16.096-8.496c10.464-5.44 17.055-16.225 17.183-28.032c.128-11.777-6.256-22.689-16.592-28.368l-481.44-257.6c-9.631-5.28-21.28-5.249-30.976.095l-478.8 257.92C6.126 379.36-.177 390.143-.113 401.84s6.496 22.4 16.817 27.97l210.384 111.983c-2.64 4.656-4.272 9.968-4.272 15.696v270.784a32.03 32.03 0 0 0 10.72 23.904c6.945 6.16 73.441 60.096 276.753 60.096c202.592 0 270.88-50.976 278-56.784c7.44-6.064 11.744-15.152 11.744-24.784V552.976c0-4.496-.944-8.768-2.608-12.64l129.424-68.369V696.48c-18.976 11.104-31.84 31.472-31.84 55.024c0 35.344 28.656 64 64 64s64-28.656 64-64c0-23.697-13.04-44.145-32.16-55.2zM736.031 812.368c-25.152 12.096-91.712 35.904-225.744 35.904c-134.88 0-199.936-25.344-223.472-37.536V573.6l207.808 110.624a31.896 31.896 0 0 0 15.184 3.84a31.675 31.675 0 0 0 14.816-3.664l211.408-111.664zM510.063 619.81l-411.6-218.561l412.32-220.976l413.6 220.336z" />
                </svg>
                Alumni
            </a>
        </li>
    </ul>

    <div class="tab-content mt-4" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
            @include('school.pages.student.panes.tab-student')
        </div>
        <div class="tab-pane fade" id="pills-alumni" role="tabpanel" aria-labelledby="pills-alumni-tab">
            @include('school.pages.student.panes.tab-alumni')
        </div>
    </div>

    {{-- modal siswa --}}
    @include('school.pages.student.widgets.student.modal-create-rfid')
    @include('school.pages.student.widgets.student.modal-detail-student')
    @include('school.pages.student.widgets.student.modal-update-student')
    @include('school.pages.student.widgets.student.import')

    {{-- modal alumni --}}
    @include('school.pages.student.widgets.alumni.modal-detail-alumni')
    @include('school.pages.student.widgets.alumni.modal-update-alumni')
    @include('school.pages.student.widgets.alumni.modal-confirm-alumnus')

    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.pages.student.scripts.rfid')
    @include('school.pages.student.scripts.delete')
    @include('school.pages.student.scripts.detail')
    @include('school.pages.student.scripts.preview')
    @include('school.pages.student.scripts.tab')
    @include('school.pages.student.scripts.update')
    @include('school.pages.student.scripts.confirm-alumnus')
@endsection
