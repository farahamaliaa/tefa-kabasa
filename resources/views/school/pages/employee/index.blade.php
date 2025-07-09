@extends('school.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-light">Pegawai</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Daftar - daftar guru dan staff di sekolah</li>
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
                            <svg width="40" height="40" viewBox="0 0 37 29" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 0V2.9H31.3077V26.1H11.3846V29H37V26.1H34.1538V0H0ZM5.69515
                                            4.35C4.18681 4.35535 2.7417 4.96804 1.67487 6.05451C0.60804
                                            7.14098 0.00600024 8.61312 0 10.15C0 13.3385 2.56723 15.95
                                            5.69515 15.95C7.20274 15.9439 8.64682 15.3308 9.71259 14.2443C10.7784
                                            13.1578 11.3794 11.6861 11.3846 10.15C11.3846 6.96435 8.82023 4.35 5.69515
                                            4.35ZM14.2308 5.8V8.7H21.3462V5.8H14.2308ZM24.1923 5.8V8.7H28.4615V5.8H24.1923ZM5.69515
                                            7.25C7.28046 7.25 8.53846 8.53035 8.53846 10.15C8.53846 11.774 7.28188 13.05 5.69515
                                            13.05C4.10131 13.05 2.84615 11.774 2.84615 10.15C2.84615 8.53035 4.10273 7.25 5.69515
                                            7.25ZM14.2308 11.6V14.5H28.4615V11.6H14.2308ZM0 17.4V29H2.84615V20.3H7.11539V29H9.96154V21.2541L12.8988
                                            22.8375C13.7313 23.287 14.7317 23.2855 15.5628 22.8375V22.8404L20.5862 20.1332L19.2585
                                            17.5667L14.2336 20.2739L9.82777 17.9046C9.21288 17.5736 8.52804 17.4004 7.83261 17.4H0Z"
                                    fill="#13DEB9" />
                            </svg>
                        </div>
                        <div class="ms-4">
                            <h4 class="card-title text-dark"><b>Jumlah Guru</b></h4>
                            <h6 style="font-size: 25px; color: #13DEB9"><b>{{ $totalTeachers }}</b></h6>
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
                            <svg width="40" height="40" viewBox="0 0 39 39" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.8008 18.0807C16.301 18.0807 14.8348 17.636 13.5878
                                            16.8027C12.3407 15.9694 11.3687 14.7851 10.7948 13.3994C10.2208
                                            12.0137 10.0706 10.489 10.3632 9.01796C10.6558 7.54694 11.3781
                                            6.19572 12.4386 5.13517C13.4992 4.07462 14.8504 3.35238
                                            16.3214 3.05978C17.7924 2.76717 19.3172 2.91735 20.7029 3.49131C22.0885
                                            4.06528 23.2729 5.03725 24.1062 6.28433C24.9394 7.5314 25.3842 8.99756
                                            25.3842 10.4974C25.3842 12.5086 24.5852 14.4375 23.1631 15.8596C21.7409
                                            17.2818 19.8121 18.0807 17.8008 18.0807ZM17.8008 5.1674C16.7295 5.1674
                                            15.6823 5.48508 14.7915 6.08027C13.9007 6.67546 13.2065 7.52143 12.7965
                                            8.5112C12.3865 9.50096 12.2793 10.5901 12.4883 11.6408C12.6973 12.6915
                                            13.2131 13.6567 13.9707 14.4142C14.7282 15.1718 15.6934 15.6876 16.7441 15.8967C17.7948
                                            16.1057 18.8839 15.9984 19.8737 15.5884C20.8635 15.1784 21.7094 14.4842 22.3046 13.5934C22.8998 12.7026 23.2175 11.6554 23.2175
                                            10.5841C23.2175 9.87274 23.0774 9.16838 22.8052 8.5112C22.533 7.85402 22.134 7.25689 21.631 6.7539C21.128 6.25092 20.5309 5.85193 19.8737 5.57972C19.2165 5.30751 18.5122 5.1674 17.8008 5.1674ZM23.835 19.3916C17.9725 18.0716 11.8391 18.707 6.37168 21.2007C5.61973 21.5599 4.98529 22.1253 4.54225 22.8311C4.09921 23.5369 3.86579 24.3541 3.86918 25.1874V31.6332C3.86918 31.7755 3.8972 31.9164 3.95164 32.0478C4.00608 32.1792 4.08588 32.2987 4.18648 32.3993C4.28707 32.4999 4.4065 32.5797 4.53794 32.6341C4.66937 32.6885 4.81025 32.7166 4.95251 32.7166C5.09478 32.7166 5.23565 32.6885 5.36708 32.6341C5.49852 32.5797 5.61795 32.4999 5.71854 32.3993C5.81914 32.2987 5.89894 32.1792 5.95338 32.0478C6.00782 31.9164 6.03584 31.7755 6.03584 31.6332V25.1874C6.02641 24.7657 6.1403 24.3503 6.36353 23.9924C6.58676 23.6345 6.90963 23.3495 7.29251 23.1724C10.586 21.6513 14.1731 20.871 17.8008 20.8866C19.8335 20.8842 21.8592 21.1242 23.835 21.6016V19.3916ZM23.9867 29.6941H30.6383V31.2107H23.9867V29.6941Z"
                                    fill="#FFAE1F" />
                                <path
                                    d="M35.9348 23.2588H30.334V25.4255H34.8515V34.493H19.5007V25.4255H26.3256V25.8805C26.3256 26.1678 26.4398 26.4434 26.643 26.6465C26.8461 26.8497 27.1217 26.9638 27.409 26.9638C27.6963 26.9638 27.9719 26.8497 28.175 26.6465C28.3782 26.4434 28.4923 26.1678 28.4923 25.8805V21.6663C28.4923 21.379 28.3782 21.1035 28.175 20.9003C27.9719 20.6971 27.6963 20.583 27.409 20.583C27.1217 20.583 26.8461 20.6971 26.643 20.9003C26.4398 21.1035 26.3256 21.379 26.3256 21.6663V23.2588H18.4173C18.13 23.2588 17.8544 23.373 17.6513 23.5761C17.4481 23.7793 17.334 24.0549 17.334 24.3422V35.5763C17.334 35.8637 17.4481 36.1392 17.6513 36.3424C17.8544 36.5455 18.13 36.6597 18.4173 36.6597H35.9348C36.2221 36.6597 36.4977 36.5455 36.7008 36.3424C36.904 36.1392 37.0181 35.8637 37.0181 35.5763V24.3422C37.0181 24.0549 36.904 23.7793 36.7008 23.5761C36.4977 23.373 36.2221 23.2588 35.9348 23.2588Z"
                                    fill="#FFAE1F" />
                            </svg>
                        </div>
                        <div class="ms-4">
                            <h4 class="card-title text-dark"><b>Jumlah Pegawai</b></h4>
                            <h6 style="font-size: 25px; color: #FFAE1F"><b>{{ $totalStaffs }}</b></h6>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('assets/images/background/buble-3.png') }}" alt="Image"
                    style="position: absolute; bottom: 0; right: 0; width: auto; height: 90px; border-bottom-right-radius: 13px;">
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row flex-wrap" id="nav-tab" role="tablist">
        <li class="nav-item col-6 col-md-auto">
            <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                id="teacher-tab" data-bs-toggle="pill" href="#teacher-content" role="tab"
                aria-controls="teacher-content" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" class="me-1">
                    <path fill="currentColor"
                        d="M4 6v2h22v16H12v2h18v-2h-2V6zm4.002 3A4.016 4.016 0 0 0 4 13c0 2.199 1.804 4 4.002 4A4.014 4.014 0 0 0 12 13c0-2.197-1.802-4-3.998-4M14 10v2h5v-2zm7 0v2h3v-2zM8.002 11C9.116 11 10 11.883 10 13c0 1.12-.883 2-1.998 2C6.882 15 6 14.12 6 13c0-1.117.883-2 2.002-2M14 14v2h10v-2zM4 18v8h2v-6h3v6h2v-5.342l2.064 1.092c.585.31 1.288.309 1.872 0v.002l3.53-1.867l-.933-1.77l-3.531 1.867l-3.096-1.634A3.005 3.005 0 0 0 9.504 18z" />
                </svg>
                <span class="d-none d-md-block font-weight-medium">Guru</span>
            </a>
        </li>
        <li class="nav-item col-6 col-md-auto">
            <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                id="employee-tab" data-bs-toggle="pill" href="#employee-content" role="tab"
                aria-controls="employee-content" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 36" class="me-1">
                    <path fill="currentColor"
                        d="M16.43 16.69a7 7 0 1 1 7-7a7 7 0 0 1-7 7m0-11.92a5 5 0 1 0 5 5a5 5 0 0 0-5-5M22 17.9a25.4 25.4 0 0 0-16.12 1.67a4.06 4.06 0 0 0-2.31 3.68v5.95a1 1 0 1 0 2 0v-5.95a2 2 0 0 1 1.16-1.86a22.9 22.9 0 0 1 9.7-2.11a23.6 23.6 0 0 1 5.57.66Zm.14 9.51h6.14v1.4h-6.14z" />
                    <path fill="currentColor"
                        d="M33.17 21.47H28v2h4.17v8.37H18v-8.37h6.3v.42a1 1 0 0 0 2 0V20a1 1 0 0 0-2 0v1.47H17a1 1 0 0 0-1 1v10.37a1 1 0 0 0 1 1h16.17a1 1 0 0 0 1-1V22.47a1 1 0 0 0-1-1" />
                </svg>
                <span class="d-none d-md-block font-weight-medium">Staf</span>
            </a>
        </li>

        <!-- Tombol Guru -->
        <li class="nav-item d-flex align-items-center col-12 col-md-auto ms-md-auto mt-2 mt-md-0 guru-buttons">
            <button type="button" class="btn btn-success px-4 w-100 w-md-auto" data-bs-toggle="modal"
                data-bs-target="#import-teacher">Import Guru</button>
        </li>
        <li class="nav-item d-flex align-items-center col-12 col-md-auto ms-0 ms-md-2 mt-2 mt-md-0 guru-buttons">
            <button type="button" class="btn btn-primary px-4 w-100 w-md-auto" data-bs-toggle="modal"
                data-bs-target="#create-teacher">Tambah Guru</button>
        </li>
        <!-- Tombol Pegawai -->
        <li class="nav-item d-flex align-items-center col-12 col-md-auto ms-md-auto mt-2 mt-md-0 pegawai-buttons d-none">
            <button type="button" class="btn btn-success px-4 w-100 w-md-auto" data-bs-toggle="modal"
                data-bs-target="#import-employe">Import Staf</button>
        </li>
        <li class="nav-item d-flex align-items-center col-12 col-md-auto ms-0 ms-md-2 mt-2 mt-md-0 pegawai-buttons d-none">
            <button type="button" class="btn btn-primary px-4 w-100 w-md-auto" data-bs-toggle="modal"
                data-bs-target="#modal-add-emplo">Tambah Staf</button>
        </li>
    </ul>


    <!-- Tab Content -->
    <div class="tab-content mt-4" id="nav-tabContent">
        <div class="tab-pane fade" id="teacher-content" role="tabpanel" aria-labelledby="teacher-tab">
            @include('school.pages.employee.panes.teacher-tab')
        </div>
        <div class="tab-pane fade" id="employee-content" role="tabpanel" aria-labelledby="employee-tab">
            @include('school.pages.employee.panes.employee-tab')
        </div>
    </div>

    @include('school.pages.employee.widgets.employe.update-employe')
    @include('school.pages.employee.widgets.employe.modal-detail')

    @include('school.pages.employee.widgets.teacher.update-teacher')
    @include('school.pages.employee.widgets.teacher.modal-rfid')

    @include('school.pages.employee.widgets.teacher.import-teacher')
    @include('school.pages.employee.widgets.employe.import-employe')
    @include('school.pages.employee.widgets.employe.add-employe')
    @include('school.pages.employee.widgets.teacher.add-teacher')
    @include('school.pages.employee.widgets.teacher.modal-detail')

    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.pages.employee.scripts.tab')
    @include('school.pages.employee.scripts.rfid')
    @include('school.pages.employee.scripts.detail')
    @include('school.pages.employee.scripts.delete')
    @include('school.pages.employee.scripts.create')
    @include('school.pages.employee.scripts.edit')
    @include('school.pages.employee.scripts.session')
@endsection
